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
    protected $blog_control;

    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $user_control;

    protected $category_control;

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
        $this->_control = $blog_control;
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
        $statut = $this->user_control->getStatut();
        */

        $posts = $this->blog_control->index(
            10,
            null,
            $request->name,
            $request->sens
        );

        $category = $this->category_control->index(
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
        $this->category_control->store($request->all(), $request);

        return redirect('kadmin/category')->with('ok', trans('kadmin.articles.stored'));
    }



    /**
     * Форма редактирование категории
     *
     * @param  App\Repositories\UserRepository $user_control
     * @param  int $id
     * @return Response
     */
    public function edit(
        UserRepository $user_control,
        $id)
    {

        $post = $this->category_control->getById($id);
        //  $this->authorize('change', $post);
        return view('kadmin.category.edit', $this->category_control->edit($post));

    }

    /**
     * Сохраниение категории
     *
     * @param  App\Http\Requests\PostUpdateRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(
        CategoryRequest $request,
        $id)
    {
        $post = $this->category_control->getById($id);


      //  $this->authorize('change', $post);

        $this->category_control->update($request->all(), $post);

        return redirect('kadmin/category')->with('ok', trans('back/blog.updated'));
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
        $post = $this->category_control->getById($id);

        // $this->authorize('change', $post);


        $this->category_control->updateActive($request->all(), $id);

        return response()->json();
    }

    /**
     * Удаление категории
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->category_control->getById($id);
        //$this->authorize('change', $post);
        $this->category_control->destroy($post);

        return redirect('kadmin/category')->with('ok', trans('back/blog.destroyed'));
    }
}


