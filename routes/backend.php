<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationsController;
use App\Http\Controllers\Backend\Auth as Auth;
use App\Http\Controllers\Backend as Backend;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
*/

Route::prefix('backend')->group(function(){

    // Login
    Route::controller(Auth\AuthController::class)->group(function() {
        Route::get('/', 'index')->name('backend.index');
        Route::post('login', 'login')->name('backend.login');
        Route::get('/logout', 'logout')->name('backend.logout');
    });

    Route::controller(Backend\DashboardController::class)->group(function() {
        Route::get('dashboard', 'index')->name('backend.dashboard');
    });

});
