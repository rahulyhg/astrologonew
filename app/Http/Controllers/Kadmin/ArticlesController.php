<?php

namespace App\Http\Controllers\Kadmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;

class ArticlesController extends Controller
{

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
        BlogRepository $blog_control,
        UserRepository $user_control,
        CategoryRepository $category_control
    )
    {
        $this->user_control = $user_control;
        $this->blog_control = $blog_control;
        $this->category_control = $category_control;
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


    /**
     * Display a listing of the resource.
     *
     * @return Redirection
     */
    public
    function index()
    {
        return redirect(route('kadmin.articles.order', [
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
    public
    function indexOrder(Request $request)
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

        if ($request->ajax()) {
            return response()->json([
                'view' => view('kadmin.articles.table', compact('statut', 'posts'))->render(),
                'links' => $links->setPath('order')->render()
            ]);
        }

        $links->setPath('')->render();

        $order = (object)[
            'name' => $request->name,
            'sens' => 'sort-' . $request->sens
        ];

        return view('kadmin.articles.index', compact('posts', 'links', 'order'));
    }

    /**
     * Форма создание статьи
     *
     * @return Response
     */
    public
    function create()
    {
        $url = config('medias.url');

        //$cat=  Category::where('active','=','1')->lists('title','id'); //Активные категории
       // $cat = Category::lists('title', 'id'); //Все категории
       $cat= $this->category_control->showDropdownAll();

        return view('kadmin.articles.create')->with(compact('url', 'cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostRequest $request
     * @return Response
     */
    public
    function store(PostRequest $request)
    {
        $this->blog_control->store($request->all(), $request->user()->id);

        return redirect('kadmin/articles')->with('ok', trans('kadmin.articles.stored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Illuminate\Contracts\Auth\Guard $auth
     * @param  string $slug
     * @return Response
     */


    /**
     * Вывод редактирование статьи
     *
     * @param  App\Repositories\UserRepository $user_control
     * @param  int $id
     * @return Response
     */
    public
    function edit(
        UserRepository $user_control,
        $id)
    {
        $post = $this->blog_control->getByIdWithTags($id);

        $this->authorize('change', $post);

        $url = config('medias.url');

        return view('kadmin.articles.edit', array_merge($this->blog_control->edit($post), compact('url')));
    }

    /**
     * Сохраниение статьи
     *
     * @param  App\Http\Requests\PostUpdateRequest $request
     * @param  int $id
     * @return Response
     */
    public
    function update(
        PostRequest $request,
        $id)
    {
        $post = $this->blog_control->getById($id);

        $this->authorize('change', $post);

        $this->blog_control->update($request->all(), $post);

        return redirect('kadmin/articles')->with('ok', trans('back/blog.updated'));
    }

    /**
     * Update "vu" for the specified resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return Response
     */
    public
    function updateSeen(
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
     * @param  int $id
     * @return Response
     */
    public
    function updateActive(
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
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {
        $post = $this->blog_control->getById($id);

        $this->authorize('change', $post);

        $this->blog_control->destroy($post);

        return redirect('blog')->with('ok', trans('back/blog.destroyed'));
    }
}


