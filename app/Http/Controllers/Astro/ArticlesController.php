<?php
namespace App\Http\Controllers\Astro;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SearchRequest;
use App\Repositories\ArticlesRepository;
use App\Repositories\UserRepository;

class ArticlesController extends Controller {

	/**
	 * The BlogRepository instance.
	 *
	 * @var App\Repositories\BlogRepository
	 */
	protected $blog_control;

	/**
	 * The UserRepository instance.
	 *
	 * @var App\Repositories\UserRepository
	 */
	protected $user_control;

	/**
	 * The pagination number.
	 *
	 * @var int
	 */
	protected $nbrPages;

	/**
	 * Create a new BlogController instance.
	 *
	 * @param  App\Repositories\BlogRepository $blog_control
	 * @param  App\Repositories\UserRepository $user_control
	 * @return void
	*/
	public function __construct(
		ArticlesRepository $blog_control,
		UserRepository $user_control)
	{
		$this->user_control = $user_control;
		$this->blog_control = $blog_control;
		$this->nbrPages = 2;

		$this->middleware('redac', ['except' => ['indexFront', 'show', 'tag', 'search']]);
		$this->middleware('admin', ['only' => 'updateSeen']);
		$this->middleware('ajax', ['only' => ['updateSeen', 'updateActive']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexFront($slug=null)
	{

		$posts = $this->blog_control->indexFront($this->nbrPages,$slug);
		$links = $posts->render();

		return view('astro.articles', compact('posts', 'links'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Redirection
	 */
	public function index()
	{
		return redirect(route('article.order', [
			'name' => 'posts.created_at',
			'sens' => 'asc'
		]));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function indexOrder(Request $request)
	{
		$statut = $this->user_control->getStatut();
		$posts = $this->blog_control->index(
			10,
			$statut == 'admin' ? null : $request->user()->id,
			$request->name,
			$request->sens
		);

		$links = $posts->appends([
				'name' => $request->name,
				'sens' => $request->sens
			]);

		if($request->ajax()) {
			return response()->json([
				'view' => view('back.blog.table', compact('statut', 'posts'))->render(),
				'links' => $links->setPath('order')->render()
			]);
		}

		$links->setPath('')->render();

		$order = (object)[
			'name' => $request->name,
			'sens' => 'sort-' . $request->sens
		];

		return view('astro.article', compact('posts', 'links', 'order'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$url = config('medias.url');

		return view('back.blog.create')->with(compact('url'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  App\Http\Requests\PostRequest $request
	 * @return Response
	 */
	public function store(PostRequest $request)
	{
		$this->blog_control->store($request->all(), $request->user()->id);

		return redirect('blog')->with('ok', trans('back/blog.stored'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Illuminate\Contracts\Auth\Guard $auth
	 * @param  string $slug
	 * @return Response
	 */
	public function show(
		Guard $auth,
		$slug)
	{
		$user = $auth->user();

            return view('astro.article', array_merge($this->blog_control->show($slug), compact('user')));


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  App\Repositories\UserRepository $user_control
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(
		UserRepository $user_control,
		$id)
	{
		$post = $this->blog_control->getByIdWithTags($id);

		$this->authorize('change', $post);

		$url = config('medias.url');

		return view('back.blog.edit',  array_merge($this->blog_control->edit($post), compact('url')));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  App\Http\Requests\PostUpdateRequest $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(
		PostRequest $request,
		$id)
	{
		$post = $this->blog_control->getById($id);

		$this->authorize('change', $post);

		$this->blog_control->update($request->all(), $post);

		return redirect('blog')->with('ok', trans('back/blog.updated'));
	}

	/**
	 * Update "vu" for the specified resource in storage.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function updateSeen(
		Request $request,
		$id)
	{
		$this->blog_control->updateSeen($request->all(), $id);

		return response()->json();
	}

	/**
	 * Update "active" for the specified resource in storage.
	 *
	 * @param  Illuminate\Http\Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function updateActive(
		Request $request,
		$id)
	{
		$post = $this->blog_control->getById($id);

		$this->authorize('change', $post);

		$this->blog_control->updateActive($request->all(), $id);

		return response()->json();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = $this->blog_control->getById($id);

		$this->authorize('change', $post);

		$this->blog_control->destroy($post);

		return redirect('blog')->with('ok', trans('back/blog.destroyed'));
	}

	/**
	 * Get tagged posts
	 *
	 * @param  Illuminate\Http\Request $request
	 * @return Response
	 */
	public function tag(Request $request)
	{
		$tag = $request->input('tag');
		$posts = $this->blog_control->indexTag($this->nbrPages, $tag);
		$links = $posts->appends(compact('tag'))->render();
		$info = trans('astro/articles.info-tag') . '<strong>' . $this->blog_control->getTagById($tag) . '</strong>';

		return view('front.blog.index', compact('posts', 'links', 'info'));
	}

	/**
	 * Find search in blog
	 *
	 * @param  App\Http\Requests\SearchRequest $request
	 * @return Response
	 */
	public function search(SearchRequest $request)
	{
		$search = $request->input('search');
		$posts = $this->blog_control->search($this->nbrPages, $search);
		$links = $posts->appends(compact('search'))->render();
		$info = $search;

		return view('astro.articles', compact('posts', 'links', 'info'));
	}

}
