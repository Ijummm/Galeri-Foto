<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LikeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister']);
});

Route::middleware(['auth', 'prevent-back'])->group(function () {
    Route::resource('galeri', FotoController::class)->parameters([
        'galeri' => 'id'
    ]);

    Route::post('/like/{id}', [LikeController::class, 'toggleLike'])->name('like.toggle');
    Route::post('/komentar/{id}', [KomentarController::class, 'store'])->name('komentar.store');
    Route::get('/my-likes', [LikeController::class, 'myLikes'])->name('likes.index');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});