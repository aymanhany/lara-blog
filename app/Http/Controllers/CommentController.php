<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, $id)
    {
        $comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => $request->user()->id,
            'user_name' => $request->user()->name,
            'post_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
