<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'user_id' => Auth()->user()->id,
            'post_id' => $request->post_id,
            'body' => $request->body,
        ]);
        return redirect()->back()->with('success', 'Komment áwmetli jaratıldı!');
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit')->with(['comment' => $comment]);
    }


    public function update(Request $request, Comment $comment)
    {
        $comment->update([
            'body' => $request->body,
        ]);
        return redirect('posts/' . $comment->post_id)->with('success', 'Komment áwmetli jańalandı!');
    }

    public function destroy(Comment $comment)
    {
        // dd($comment);
        $comment->delete();
        return redirect()->back()->with('success', 'Komment áwmetli óshirildi!');
    }
}
