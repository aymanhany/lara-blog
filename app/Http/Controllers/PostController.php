<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        // sending all posts to posts view with post model
        return view('posts.all', ['posts' => Post::all()]);
    }

    public function indexByUser()
    {
        // this line displays only posts related to logged in user
        return view('posts.mine', ['posts' => Post::where('user_id', Auth::user()->id)->get()]);
    }

    public function show(Post $id)
    {
        // showing single post
        return view('posts.post', ['post' => $id]);
    }


    public function create() {
        // route for creating new post
        return view('posts.create');
    }


    public function store(Request $request)
    {
        // saving new post to datatbase
        $newPost = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        return redirect('posts/' . $newPost->id);
    }
}
