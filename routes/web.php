<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('about', [PageController::class, 'about'])->name('about');
Route::get('service', [PageController::class, 'service'])->name('service');
Route::get('price', [PageController::class, 'price'])->name('price');
Route::get('contact', [PageController::class, 'contact'])->name('contact');


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');

Route::get('posts/mine', [PostController::class, 'posts_mine'])->name('posts.mine');
Route::delete('posts/{post}/imageDestroy', [PostController::class, 'imageDestroy'])->name('posts.imageDestroy');

Route::resources([
  'posts' => PostController::class,
  'comments' => CommentController::class,
  'users' => UserController::class,
]);
