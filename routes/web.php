<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;

Route::get("/post", [PostController::class, 'index'])->name("posts.index");
Route::get("/post/create", [PostController::class, "create"])->name("posts.create")->middleware("auth");
Route::post("/post/create", [PostController::class, 'store'])->middleware("auth");
Route::get("/post/{post:slug}/edit", [PostController::class, 'edit'])->middleware("auth");
Route::patch("/post/{post:slug}/edit", [PostController::class, 'update'])->middleware("auth");
Route::get("/post/{post:slug}", [PostController::class, "show"]);
Route::delete("/post/{post:slug}/delete", [PostController::class, 'destroy'])->middleware("auth");

Route::get("/category/{category:slug}", [CategoryController::class, 'show']);
Route::get("/tag/{tag:slug}", [TagController::class, 'index']);

Route::view("/contact", "contact");
Route::view("/about", "about");
Route::view("/login", "login");

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
