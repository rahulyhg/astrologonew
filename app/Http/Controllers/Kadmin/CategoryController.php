<?php

namespace App\Http\Controllers\Kadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\BlogRepository;
use App\Repositories\UserRepository;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{

    /**
     * The BlogRepository instance.
     *
     * @var App\Repositories\BlogRepository
     */
    protected $blog_gestion;

    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_gestion;

    protected $category_gestion;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;

    /**
     * Create a new BlogController instance.
     *
     * @param  App\Repositories\BlogRepository $blog_gestion
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct(
        BlogRepository $blog_gestion,
        UserRepository $user_gestion,
        CategoryRepository $category_gestion
    )
    {
        $this->user_gestion = $user_gestion;
        $this->blog_gestion = $blog_gestion;
        $this->category_gestion = $category_gestion;
        $this->_gestion = $blog_gestion;
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
    public function index()
    {
        return redirect(route('kadmin.category.order', [
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

        /*
        $statut = $this->user_gestion->getStatut();
        */

        $posts = $this->blog_gestion->index(
            10,
            null,
            $request->name,
            $request->sens
        );

        $category = $this->category_gestion->index(
            10,
            $request->name,
            $request->sens
        );


        $links = $posts->appends([
            'name' => $request->name,
            'sens' => $request->sens
        ]);

        if ($request->ajax()) {
            return response()->json([
                'view' => view('kadmin.category.table', compact('statut', 'category'))->render(),
                'links' => $links->setPath('order')->render()
            ]);
        }

        $links->setPath('')->render();

        $order = (object)[
            'name' => $request->name,
            'sens' => 'sort-' . $request->sens
        ];

        return view('kadmin.category.index', compact('category', 'links', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $url = config('medias.url');

        return view('kadmin.category.create')->with(compact('url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PostRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $this->category_gestion->store($request->all(), $request);

        return redirect('kadmin/category')->with('ok', trans('kadmin.articles.stored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Illuminate\Contracts\Auth\Guard $auth
     * @param  string $slug
     * @return Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @param  int $id
     * @return Response
     */
    public function edit(
        UserRepository $user_gestion,
        $id)
    {
        $post = $this->blog_gestion->getByIdWithTags($id);

        $this->authorize('change', $post);

        $url = config('medias.url');

        return view('kadmin.category.edit', array_merge($this->blog_gestion->edit($post), compact('url')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PostUpdateRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(
        PostRequest $request,
        $id)
    {
        $post = $this->blog_gestion->getById($id);

        $this->authorize('change', $post);

        $this->blog_gestion->update($request->all(), $post);

        return redirect('blog')->with('ok', trans('back/blog.updated'));
    }



    /**
     * Update "active" for the specified resource in storage.
     *
     * @param  Illuminate\Http\Request $request
     * @param  int $id
     * @return Response
     */
    public function updateActive(
        Request $request,
        $id)
    {
        $post = $this->category_gestion->getById($id);

       // $this->authorize('change', $post);


        $this->category_gestion->updateActive($request->all(), $id);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->blog_gestion->getById($id);

        $this->authorize('change', $post);

        $this->blog_gestion->destroy($post);

        return redirect('blog')->with('ok', trans('back/blog.destroyed'));
    }
}


