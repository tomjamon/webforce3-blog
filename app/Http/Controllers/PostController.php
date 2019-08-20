<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{

    public function category($title)
    {
        $category = Category::where([
            ['title','=',$title]
        ])->first();

        $categories = Category::all();
        $posts = Post::where([
            ['active', '=', true],
            ['draft', '=', false],
            ['category_id', '=', $category->id]
        ])
            ->orderBy('created_at','DESC')
            ->paginate(9);

        return view('category', [
            'posts' => $posts,
            'title_category' => $category->title,
            'categories' => $categories
        ]);
    }

    public function articles()
    {
        $categories =  Category::all();
        $posts = Post::where([
                ['active', '=', true],
                ['draft', '=', false]
            ])
            ->orderBy('created_at','DESC')
            ->paginate(9);
        // Renvoie un objet "Pagination" pour pouvoir mettre un systeme de page

        return view('articles', [
            'posts' => $posts,
            'categories' => $categories,
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
