<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get("/", HomeController::class);

Route::get("/post", [PostController::class, 'index']);
Route::get("/post/create", [PostController::class, "create"]);
Route::post("/post/create", [PostController::class, 'store']);
Route::get("/post/{post:slug}/edit", [PostController::class, 'edit']);
Route::patch("/post/{post:slug}/edit", [PostController::class, 'update']);
Route::get("/post/{post:slug}", [PostController::class, "show"]);

Route::view("/contact", "contact");
Route::view("/about", "about");
Route::view("/login", "login");
