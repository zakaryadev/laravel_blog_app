<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $comment = Comment::create([
            'user_id' => Auth()->user()->id,
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);

        return redirect()->back()->with('success', 'Comment áwmetli jaratıldı!');
    }
}
