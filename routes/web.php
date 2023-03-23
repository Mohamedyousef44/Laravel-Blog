<?php


use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class)->middleware(['auth']);
Route::post('/posts/{post}/comment', [PostController::class , 'comment'])->name('posts.comment');

Route::get('/users' , [UserController::class , 'index'])->name('users.index');
Route::get('/users/{user}' , [UserController::class , 'show'])->name('users.show');
Route::get('/users/{user}/edit' , [UserController::class , 'edit'])->name('users.edit');
Route::put('/users/{user}' , [UserController::class , 'update'])->name('users.update');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
