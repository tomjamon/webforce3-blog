<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title'); // Mon premier article
            $table->longText('content')->nullable(); // Bonjour, c'est mon premier artile
            $table->boolean('draft')->default(0); // O (faux) 1 (vrai)
            $table->boolean('active')->default(0); // O (faux) 1 (vrai)
            $table->timestamps(); // created_at & updated_at
            $table->enum('theme', ['Symfony', 'Laravel', 'Wordpress']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
