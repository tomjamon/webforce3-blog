<?php

namespace App\Http\Controllers\Admin;

// Ici, je met ce que j'ai besoin dans mon controller;
// Request car je fais des requêtes, Post car j'utilise la class Post
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // Va chercher la vue resources/views/admin/posts/index.blade.php
        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        // Va chercher la vue resources/views/admin/posts/create.blade.php
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post; // Je crée un nouvel objet Post
        $post->title = $request->input('title'); // Je lui assigne un titre
        $post->content = $request->input('content'); // je lui assigne un contenu
        $post->save(); // Je sauvegarde (méthode magique de Laravel)

        return redirect()->route('articles');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        $request->session()->flash('status', 'Article bien modifié');

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
