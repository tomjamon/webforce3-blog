<?php

namespace App\Http\Controllers\Admin;

// Ici, je met ce que j'ai besoin dans mon controller;
// Request car je fais des requêtes, Post car j'utilise la class Post

use App\Http\Requests\PostRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

/**
 * Class PostController
 * @package App\Http\Controllers\Admin
 */
class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::paginate(10);

        // Va chercher la vue resources/views/admin/posts/index.blade.php
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();

         return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }


    public function store(PostRequest $request)
    {
        $postData = $request->validated();

        $post = new Post;
        $post->title = $postData['title'];
        $post->content = $postData['content'];
        $post->category_id = $postData['category_id'];
        $post->theme = $postData['theme'];
        if (isset($postData['draft'])) {
            $post->draft = true;
        } else {
            $post->draft = false;
        }
        if (isset($postData['active'])) {
            $post->active = true;
        } else {
            $post->active = false;
        }
        $post->save();

        return redirect()->route('articles');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.posts.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        $postData = $request->validated();
        $post = Post::find($id);
        $post->title = $postData['title'];
        $post->content = $postData['content'];
        $post->category_id = $postData['category_id'];
        $post->theme = $postData['theme'];
        if (isset($postData['draft'])) {
            $post->draft = true;
        } else {
            $post->draft = false;
        }
        if (isset($postData['active'])) {
            $post->active = true;
        } else {
            $post->active = false;
        }
        $post->save();
        $request->session()->flash('status', 'Article bien modifié');

        return redirect()->route('posts.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
