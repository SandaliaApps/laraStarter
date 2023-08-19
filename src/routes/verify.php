<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use SandaliaApps\LaraStarter\App\Http\Controllers\Auth\VerificationController;

Route::get('/email/verify',[VerificationController::class,'notice'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    if(Auth::check()){
        return redirect()->route(Auth::user()->role->slug .'.dashboard')->with('success', 'Login successful');
    }

})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification',[VerificationController::class,'send'])->middleware(['throttle:6,1'])->name('verification.send');