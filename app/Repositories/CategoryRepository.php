<?php

namespace App\Repositories;

use App\Models\Post,
    App\Models\Tag,
    App\Models\Comment,
    App\Models\Category;


class CategoryRepository extends BaseRepository {

    /**
     * The Tag instance.
     *
     * @var App\Models\Tag

    /**
     * The Comment instance.
     *
     * @var App\Models\Comment
     */
    protected $caterory;

    /**
     * Create a new BlogRepository instance.
     *
     * @param  App\Models\Post $post
     * @param  App\Models\Tag $tag
     * @param  App\Models\Comment $comment
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->model = $category;

    }

    /**
     * Create or update a post.
     *
     * @param  App\Models\Post $post
     * @param  array  $inputs
     * @param  bool   $user_id
     * @return App\Models\Post
     */
    private function savePost($post, $inputs, $user_id = null)
    {
        $post->title = $inputs['title'];
        $post->slug = $inputs['slug'];
        $post->active = isset($inputs['active']);

        $post->save();

        return $post;
    }

    /**
     * Create a query for Post.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    private function queryActiveWithUserOrderByDate()
    {
        return $this->model
            ->select('id', 'created_at', 'updated_at', 'title', 'slug', 'user_id', 'summary')
            ->whereActive(true)
            ->with('user')
            ->latest();
    }


    /**
     * Get post collection.
     *
     * @param  int  $n
     * @param  int  $id
     * @return Illuminate\Support\Collection
     */
    public function indexTag($n, $id)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->whereHas('tags', function($q) use($id) {
            $q->where('tags.id', $id);
        })
            ->paginate($n);
    }

    /**
     * Get search collection.
     *
     * @param  int  $n
     * @param  string  $search
     * @return Illuminate\Support\Collection
     */
    public function search($n, $search)
    {
        $query = $this->queryActiveWithUserOrderByDate();

        return $query->where(function($q) use ($search) {
            $q->where('summary', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%");
        })->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @param  int     $n
     * @param  int     $user_id
     * @param  string  $orderby
     * @param  string  $direction
     * @return Illuminate\Support\Collection
     */
    public function index($n, $user_id = null, $orderby = 'name', $direction = 'desc')
    {
        $query = $this->model->orderBy('title', $direction);

        return $query->paginate($n);
    }

    /**
     * Get post collection.
     *
     * @param  string  $slug
     * @return array
     */
    public function show($slug)
    {
        $post = $this->model->with('user', 'tags')->whereSlug($slug)->firstOrFail();

        $comments = $this->comment
            ->wherePost_id($post->id)
            ->with('user')
            ->whereHas('user', function($q) {
                $q->whereValid(true);
            })
            ->get();

        return compact('post', 'comments');
    }

    /**
     * Get post collection.
     *
     * @param  App\Models\Post $post
     * @return array
     */
    public function edit($post)
    {

        return compact('post');
    }

    /**
     * Get post collection.
     *
     * @param  int  $id
     * @return array
     */
    public function GetByIdWithTags($id)
    {
        return $this->model->with('tags')->findOrFail($id);
    }

    /**
     * Update a post.
     *
     * @param  array  $inputs
     * @param  App\Models\Post $post
     * @return void
     */
    public function update($inputs, $post)
    {
        $post = $this->savePost($post, $inputs);


      //  $post->tags()->sync($tags_id);
    }

    /**
     * Update "seen" in post.
     *
     * @param  array  $inputs
     * @param  int    $id
     * @return void
     */
    public function updateSeen($inputs, $id)
    {
        $post = $this->getById($id);

        $post->seen = $inputs['seen'] == 'true';

        $post->save();
    }

    /**
     * Update "active" in post.
     *
     * @param  array  $inputs
     * @param  int    $id
     * @return void
     */
    public function updateActive($inputs, $id)
    {
        $category = $this->getById($id);

        $category->active = $inputs['active'] == 'true';

        $category->save();
    }

    /**
     * Create a post.
     *
     * @param  array  $inputs
     * @param  int    $user_id
     * @return void
     */
    public function store($inputs, $user_id)
    {
        $post = $this->savePost(new $this->model, $inputs, $user_id);

        $post->save();


        // Maybe purge orphan tags...
    }

    /**
     * Destroy a post.
     *
     * @param  App\Models\Post $post
     * @return void
     */
    public function destroy($post) {

        $post->delete();
    }

    /**
     * Get post slug.
     *
     * @param  int  $comment_id
     * @return string
     */
    public function getSlug($comment_id)
    {
        return $this->comment->findOrFail($comment_id)->post->slug;
    }

    /**
     * Get tag name by id.
     *
     * @param  int  $tag_id
     * @return string
     */
    public function getTagById($tag_id)
    {
        return $this->tag->findOrFail($tag_id)->tag;
    }


    /**
     * Получение списка ВСЕХ категорий  для выпадающего списка
     *
     *
     * @return array
     */
    public function showDropdownAll()
    {
        return  $this->model->lists('title', 'id');

    }

    /**
     * Получение списка категорий  для выпадающего списка
     *
     *
     * @return array
     */
    public function showDropdown()
    {
        return  $this->model->where('active','=','1')->lists('title','id');

    }




}
