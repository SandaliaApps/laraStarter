<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function notice(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
        ? redirect()->route(Auth::user()->role->slug .'.dashboard')->with('success', 'Registration successful')
        : view('laraStarter::auth.verify-email');
    }

    public function send(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('auth')->with('success', 'Registration successful');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
