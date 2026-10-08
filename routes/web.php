<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Rutas Públicas / Autenticación
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
});

// Rutas Protegidas
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/mis-notas', [PostController::class, 'myPosts'])->name('posts.my_posts');
    Route::get('/crear-nota', [PostController::class, 'create'])->name('posts.create');
    Route::post('/crear-nota', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/nota/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/cuenta', [ProfileController::class, 'show'])->name('profile.show');
});