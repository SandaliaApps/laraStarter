<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SandaliaApps\LaraStarter\App\Models\User;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{

    public static function dashboard(Request $request)
    {
        if($request->ajax()){
            self::getUsers();
        }
        return view('laraStarter::admin.dashboard');
    }

    public static function getUsers(){

        $user = User::select('id','name','username','email','role_id')->get();

        return DataTables::of($user)
        ->editColumn('role', '{{$user->role->slug}}')
        ->make(true);

    }

}
