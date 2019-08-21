<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $data = $request->validated();

        $comment = new Comment;
        $comment->content = $data['content'];
        $comment->post_id = $data['post_id'];
        $comment->user_id = auth()->user()->id;
        $comment->save();

        Session::flash('status', 'Votre commentaire a bien été pris en compte');

        return back();
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
