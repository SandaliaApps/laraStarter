<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use SandaliaApps\LaraStarter\App\Rules\Recaptcha;


class LoginController extends Controller
{
   
    public function loginForm(Request $request)
    {
        return view('laraStarter::auth.login_form',['request' => $request]);
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
            'g-token' => ['required',new Recaptcha]
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password], $request->remember)){

            $request->session()->regenerate();

            if(Auth::check()){
                return redirect()->route('auth')->with('success', 'Login successful');
            }

        }else{
            return back()->with('error','Invalid email or password!');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout successful');

    }
}
