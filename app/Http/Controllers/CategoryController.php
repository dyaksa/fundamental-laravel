<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function show(Category $category)
    {
        $posts = $category->posts()->simplePaginate(5);
        return view("posts.index", [
            "posts" => $posts,
            "category" => $category->title
        ]);
    }
}
