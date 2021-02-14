<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->simplePaginate(5);
        return view('posts.index', [
            'posts' => $posts,
            'tag' => $tag
        ]);
    }
}
