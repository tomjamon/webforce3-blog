<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un ARTICLE a plusieurs COMMENTAIRE
    public function comments()
    {
        return $this
            ->hasMany(Comment::class)
            ->orderBy('created_at', 'DESC');
    }
}
