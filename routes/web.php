<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaceController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

Route::middleware(['auth'])->group( function () {
    Route::get('/', [FaceController::class, 'index'])->name('facegram');
    Route::get('/profile', [FaceController::class, 'show'])->name('profile');

    // edit profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // user show
    Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');
});

// Routing Auth
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::post('prosesRegister', [AuthController::class, 'prosesRegister'])->name('prosesRegister');
Route::post('prosesLogin', [AuthController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// posts
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// follow
Route::post('/follow', [FollowController::class, 'store'])->name('follow.store');
Route::post('/follow/{id}', [FollowController::class, 'destroy'])->name('follow.destroy');



