<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function auth()
    {
        if(Auth::check()){
            return redirect()->route(Auth::user()->role->slug .'.dashboard');
        }
        return redirect()->route('login');
    }
}
