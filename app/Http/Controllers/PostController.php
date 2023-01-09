<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //

    public function index()
    {
        return view('posts.all', ['posts' => Post::all()]);
    }

    public function indexByUser()
    {
        return view('posts.mine', ['posts' => Post::where('user_id', Auth::user()->id)->get()]);
    }

    public function show(Post $id)
    {
        return view('posts.post', ['post' => $id]);
    }


    public function create() {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $newPost = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        return redirect('posts/' . $newPost->id);
    }
}
