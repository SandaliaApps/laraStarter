<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SandaliaApps\LaraStarter\App\Models\User;

class AdminController extends Controller
{

    public static function dashboard()
    {
        
        return view('laraStarter::admin.dashboard');
    }

    public static function getUsers(){
        $userData = "";

        $users = User::all();

        foreach($users as $user){
            $userData .= '<tr>
                            <td>'.$user->id.'</td>
                            <td>'.$user->name.'</td>
                            <td>'.$user->username.'</td>
                            <td>'.$user->email.'</td>
                            <td>'.$user->role->name.'</td>
                        </tr>';
        }

        return $userData;
    }

}
