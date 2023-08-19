<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use SandaliaApps\LaraStarter\App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SandaliaApps\LaraStarter\App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registerForm(Request $request)
    {
        return view('laraStarter::auth.register_form',['request' => $request]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email,except,id',
            'password' => 'required|confirmed|min:8|max:16',
            'password_confirmation' => 'required|min:8|max:16',
            'g-token' =>['required',new Recaptcha]
        ]);

 
        $user = User::create([
            'name' => $request->name,
            'terms' => 1,
            'username' => explode(" ",$request->name)[0],
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('auth')->with('success', 'Registration successful');

    }

}
