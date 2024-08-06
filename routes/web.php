<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\LocalisationMiddleware;
use App\Http\Controllers\LocalisationController;

Route::get('/locale/{locale}', [LocalisationController::class, 'setLanguage'])->name('setLanguage');

Route::group(['middleware' => ['web', LocalisationMiddleware::class]], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');

    Route::resource('posts', PostController::class)->only(['index', 'show']);

    Route::post('/newsletter/signup', [SubscriberController::class, 'signUp'])->name('newsletter.signup');
});