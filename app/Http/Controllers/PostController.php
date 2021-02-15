<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
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
        return view('posts.create', [
            'post' => new Post(),
            "submit" => "Publish",
            "categories" => Category::get(),
            "tags" => Tag::get()
        ]);
    }

    public function store(PostRequest $request)
    {
        $attr = $request->all();
        $attr['category_id'] = request('category');
        $attr['slug'] = Str::slug(request('title'));
        $post = Post::create($attr);
        $post->tags()->attach(request('tags'));
        request()->session()->flash('success', 'success created post');
        return redirect("/post");
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            "categories" => Category::get(),
            "tags" => Tag::get()
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $attr = $request->all();
        $attr['category_id'] = request("category");
        $post->update($attr);
        $post->tags()->sync(request('tags'));
        request()->session()->flash('success', 'success update post');
        return redirect('/post');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        request()->session()->flash("success", 'successfull delete post');
        return redirect("/post");
    }
}
