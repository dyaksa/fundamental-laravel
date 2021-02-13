<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->simplePaginate(5)
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }
}
