<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => Str::random(10),
        'content' => Str::random(255),
        // 'price' => $faker->randomFloat(2, 0, 200)
        'draft' => 0,
        'active' => rand(0,1),
        'created_at' => now(),
        'updated_at' => now(),
    ];

   /*
    *              'title' => Str::random(10),
                'content' => Str::random(255),
                'draft' => 0,
                'active' => rand(0,1),
                'theme' => $theme[rand(0,2)],
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
    */



});
