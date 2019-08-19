<?php

// Groupement de toutes les routes accessibles uniquement quand on est connecté
Route::prefix('backoffice')->middleware('auth')->namespace('Admin')->group(function() {
    // Appels directement dans App\Http\Controllers\Admin grace a namespace('Admin)
    // Gestion des articles
    Route::get('posts/create', 'PostController@create')->name('posts.create'); // Formulaire de création
    Route::post('posts/store', 'PostController@store')->name('posts.store'); // Sauvegarde de l'article
    Route::get('posts', 'PostController@index')->name('posts.index'); // ->middleware('auth')
    Route::get('posts/{id}/edit', 'PostController@edit')->name('posts.edit'); // Edition d'un article
    Route::put('posts/{id}/update', 'PostController@update')->name('posts.update'); // Enregistrer la modification
    Route::get('posts/{id}/destroy', 'PostController@destroy')->name('posts.destroy'); // Supprime un article
});

// localhost/blog/public/a-propos va me renvoyer sur public function bonjour() dans le HomeController
Route::get('/', 'PostController@articles');

// Page d'accueil
Route::get('/home', 'HomeController@index')->name('home');

// Vue d'un article spécific
Route::get('article/{id}', 'PostController@article')->name('article');

// Liste des articles
Route::get('articles', 'PostController@articles')->name('articles');

// Routes pour l'authentification
Auth::routes();




