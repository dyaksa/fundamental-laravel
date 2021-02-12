<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

Route::get("/", HomeController::class);

Route::get("/post/{post:slug}", [PostController::class, "show"]);

Route::view("/contact", "contact");
Route::view("/about", "about");
Route::view("/login", "login");
