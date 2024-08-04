<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LocalisationController;
use App\Http\Middleware\LocalisationMiddleware;

Route::get('/locale/{locale}', [LocalisationController::class, 'setLanguage'])->name('setLanguage');

Route::group(['middleware' => ['web', LocalisationMiddleware::class]], function () {
    Route::get('/', [PageController::class, 'index'])->name('home');
});