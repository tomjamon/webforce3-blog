<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Mail\ContactReceived;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

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
        Session::flash('status', 'Article bien ajouté');
        Session::flash('type', 'alert-success');

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.posts.edit', [
            'categories' => $categories,
            'post' => $post
        ]);
    }

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
        Session::flash('status', 'Article bien modifié');
        Session::flash('type', 'alert-success');

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('status', 'Article bien supprimé');
        Session::flash('type', 'alert-warning');

        return redirect()->route('posts.index');
    }
}
