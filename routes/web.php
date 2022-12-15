<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'index'])->name('home_page');
Route::resource("category", CategoryController::class)->middleware('admin');
Route::resource("post", PostController::class)->middleware('admin');
Route::get('details-post/{slug}', [AppController::class, 'detailsPost'])->name('post.details');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('logout', [HomeController::class, 'logout'])->name('logout');
