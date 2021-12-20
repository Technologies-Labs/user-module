<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\Post;
use Modules\User\Services\PostService;
use Modules\User\http\Requests\PostRequest;

class PostsController extends Controller
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request)
    {
        $post = $this->postService
        ->setGroupId($request->group_id)
        ->setTitle($request->title)
        ->setContent($request->content)
        ->setImage($request->image)
        ->createPost()
        ->getData();

        return redirect()->back()->with($post->success,$post->message);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return redirect()->route('')->with('failed',"Post Not Found");
        }

        $postUpdate = $this->postService
        ->setTitle($request->title)
        ->setContent($request->content)
        ->updateImage($request->image , $post->image)
        ->updatePost($post)
        ->getData();

        return redirect()->back()->with($postUpdate->success,$postUpdate->message);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return redirect()->route('')->with('failed',"Post Not Found");
        }
        $post->delete();
        return "Post deleted!";
    }
}
