<?php

// Groupement de toutes les routes accessibles uniquement quand on est connecté
Route::prefix('backoffice')->middleware('auth','checkAdmin')->namespace('Admin')->group(function() {
    Route::resource('posts', 'PostController');
    Route::resource('pages', 'PageController');
});

Route::resource('comments', 'CommentController');

// localhost/blog/public/a-propos va me renvoyer sur public function bonjour() dans le HomeController
Route::get('/', 'PostController@articles');

// Page d'accueil
Route::get('/home', 'HomeController@index')->name('home');

// Vue d'un article spécific
Route::get('article/{id}', 'PostController@article')->name('article');

Route::get('category/{title}', 'PostController@category')->name('category');

// Liste des articles
Route::get('articles', 'PostController@articles')->name('articles');

// Routes pour l'authentification
Auth::routes();




