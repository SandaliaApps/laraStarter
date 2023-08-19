<?php

use Illuminate\Support\Facades\Route;
use SandaliaApps\LaraStarter\App\Http\Controllers\Admin\AdminController;

/* ------------------------- Admin Route ---------------------------- */
    Route::get('admin',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('admin');

    Route::prefix('admin')->group(function(){
        
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware(['admin']);
    });
    /* ------------------------- End Admin Route ---------------------------- */


    /* ------------------------- Manager Route ---------------------------- */
    Route::get('manager',[AdminController::class,'dashboard'])->name('manager.dashboard')->middleware('manager');

    Route::prefix('manager')->group(function(){
        
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('manager.dashboard')->middleware('manager');
    });
    /* ------------------------- End Admin Route ---------------------------- */

    /* ------------------------- Manager Route ---------------------------- */
    Route::get('customer',[AdminController::class,'dashboard'])->name('customer.dashboard')->middleware('customer');

    Route::prefix('customer')->group(function(){
        
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('customer.dashboard')->middleware(['customer']);
    });
    /* ------------------------- End Admin Route ---------------------------- */
