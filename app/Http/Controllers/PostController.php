<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Renvoie la liste des articles
    public function articles()
    {
        $posts = Post::orderBy('created_at','DESC')->get(); // Récupère tous les articles

        return view('articles', [
            'posts' => $posts,
            // J'envoie la liste des article a ma vue
        ]);
    }

    // Renvoie un article
    public function article($id)
    {
        $post = Post::find($id); // Je vais cherche le post X
        // dump($post->title); // J'affiche le titre pour tester

        return view('article', [
            'post' => $post, // J'envoie l'article a ma vue
        ]);
        // A ajouter dans la vue
        // {{ $post->title }}
    }
}
