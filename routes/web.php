<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

Route::get("/", HomeController::class);

Route::get("/post", [PostController::class, 'index']);
Route::get("/post/create", [PostController::class, "create"]);
Route::post("/post/create", [PostController::class, 'store']);
Route::get("/post/{post:slug}/edit", [PostController::class, 'edit']);
Route::patch("/post/{post:slug}/edit", [PostController::class, 'update']);
Route::get("/post/{post:slug}", [PostController::class, "show"]);
Route::delete("/post/{post:slug}/delete", [PostController::class, 'destroy']);

Route::get("/category/{category:slug}", [CategoryController::class, 'show']);
Route::get("/tag/{tag:slug}", [TagController::class, 'index']);

Route::view("/contact", "contact");
Route::view("/about", "about");
Route::view("/login", "login");
