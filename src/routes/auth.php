<?php

use Illuminate\Support\Facades\Route;
use SandaliaApps\LaraStarter\App\Http\Controllers\AjaxController;
use SandaliaApps\LaraStarter\App\Http\Controllers\Auth\ForgotPasswordController;
use SandaliaApps\LaraStarter\App\Http\Controllers\Auth\LoginController;
use SandaliaApps\LaraStarter\App\Http\Controllers\Auth\RegisterController;
use SandaliaApps\LaraStarter\App\Http\Controllers\Auth\NewPasswordController;
use SandaliaApps\LaraStarter\App\Http\Controllers\RedirectController;

    /* ------------------------- Auth Route ---------------------------- */
    Route::get('/auth',[RedirectController::class,'auth'])->name('auth');
    Route::prefix('auth')->middleware('guest')->group(function(){
        Route::get('/login',[LoginController::class,'loginForm'])->name('login');
        Route::get('/register',[RegisterController::class,'registerForm'])->name('register');
        Route::get('/forgot-password',[ForgotPasswordController::class,'request'])->name('password.request');
        Route::post('/forgot-password',[ForgotPasswordController::class,'email'])->name('password.email');
        Route::get('/reset-password/{token}',[NewPasswordController::class,'reset'])->name('password.reset');
        Route::post('/reset-password',[NewPasswordController::class,'update'])->name('password.update');
        Route::post('/login',[LoginController::class,'login'])->name('login');
        Route::post('/register',[RegisterController::class,'register'])->name('register');
    });

    Route::prefix('auth')->middleware('auth')->group(function(){
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
        Route::post('/logout',[LoginController::class,'logout'])->name('logout');
    });

    /* ----------------------- End Auth Route -------------------------- */


