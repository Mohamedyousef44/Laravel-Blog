<?php


use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginWithGithubController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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



Route::get('/auth/redirect/github', [LoginWithGithubController::class , 'redirectToGithub']);
Route::get('/auth/callback/github', [LoginWithGithubController::class , 'handleGithubCallback']);

Route::get('/auth/redirect/google', [LoginWithGoogleController::class , 'redirectToGoogle']);
Route::get('/auth/callback/google', [LoginWithGoogleController::class , 'handleGoogleCallback']);
