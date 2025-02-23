<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

/**
 * @see RegisterController
 * @see LoginController
 * @see LogoutController
 * @see UserController
 * @see FileController
 * @see FolderController
 */

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(GuestMiddleware::class)->group(function () {
    Route::controller(RegisterController::class)->prefix('register')->name('register.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::controller(LoginController::class)->prefix('login')->name('login.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
});

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::controller(UserController::class)->name('user.')->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(FileController::class)->name('file.')->group(function () {
        Route::get('/upload', 'uploadForm')->name('upload');
        Route::post('/upload', 'upload')->name('upload');
    });

    Route::controller(FolderController::class)->prefix('folders')->name('folders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::delete('/{folder}', 'destroy')->name('destroy');
    });
});

