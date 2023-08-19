<?php

use Illuminate\Support\Facades\Route;
use SandaliaApps\LaraStarter\App\Http\Controllers\AjaxController;

Route::middleware('web')->group(function(){

    Route::get('/',function(){ return view('laraStarter::home.welcome'); })->name('home');

    Route::group(['namespace'=>'SandaliaApps\LaraStarter\Http\Controllers'],function(){

        Route::get('/ajax',[AjaxController::class,'index'])->name('ajax');
        
        Route::middleware('auth')->group(function () {
    
            require __DIR__.'/verify.php';
    
            Route::middleware('verified')->group(function(){
            
                require __DIR__.'/dashboard.php';
        
            });
    
        });
    
        require __DIR__.'/auth.php';
    
    });    

});