<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostsHasTag extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
