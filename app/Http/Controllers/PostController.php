<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $postInput = $request->all();
        $postInput['slug'] = Str::slug($request->title);
        Post::create($postInput);
        return back();
    }
}
