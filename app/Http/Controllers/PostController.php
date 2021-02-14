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

    public function store()
    {
        $attr = request()->validate([
            'title' => 'required|min:3|max:20',
            'body' => 'required'
        ]);

        $attr['slug'] = Str::slug(request('title'));
        Post::create($attr);
        request()->session()->flash('success', 'success created post');
        return redirect("/post");
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attr = request()->validate([
            'title' => 'required|min:3|max:20',
            'body' => 'required'
        ]);
        $post->update($attr);
        request()->session()->flash('success', 'success update post');
        return redirect('/post');
    }
}
