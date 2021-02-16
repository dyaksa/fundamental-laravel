<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

Route::get("/post", [PostController::class, 'index'])->name("posts.index");

Route::middleware('auth')->prefix("post")->group(function () {
    Route::get("create", [PostController::class, "create"])->name("posts.create");
    Route::post("create", [PostController::class, 'store']);
    Route::get("{post:slug}/edit", [PostController::class, 'edit']);
    Route::patch("{post:slug}/edit", [PostController::class, 'update']);
    Route::delete("{post:slug}/delete", [PostController::class, 'destroy']);
});

Route::get("/post/{post:slug}", [PostController::class, "show"]);
Route::get("/category/{category:slug}", [CategoryController::class, 'show']);
Route::get("/tag/{tag:slug}", [TagController::class, 'index']);

Route::view("/contact", "contact");
Route::view("/about", "about");
Route::view("/login", "login");

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
