<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('home_page');
Route::resource("category", CategoryController::class);
Route::resource("post", PostController::class);
Route::get('details-post/{slug}', [AppController::class, 'detailsPost'])->name('post.details');
