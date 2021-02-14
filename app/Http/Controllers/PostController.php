<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
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
        return view('posts.create', ['post' => new Post()]);
    }

    public function store(PostRequest $request)
    {
        $attr = $request->all();
        $attr['slug'] = Str::slug(request('title'));
        Post::create($attr);
        request()->session()->flash('success', 'success created post');
        return redirect("/post");
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $post->update($attr);
        request()->session()->flash('success', 'success update post');
        return redirect('/post');
    }
}
