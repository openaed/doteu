<?php

use App\Http\Middleware\IsLoggedIn;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;

Route::group(['middleware' => ['web', IsLoggedIn::class]], function () {
    Route::get('/', function () {
        if(!auth()->user()) {
            return redirect()->route('admin.login');
        } else {
            return redirect()->route('admin.dashboard');
        }
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/login', [LoginController::class, 'loginPage'])->name('login')->withoutMiddleware([IsLoggedIn::class]);
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt')->withoutMiddleware([IsLoggedIn::class]);

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('posts', PostController::class);
});
