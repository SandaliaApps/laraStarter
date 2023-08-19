<?php

namespace SandaliaApps\LaraStarter\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use SandaliaApps\LaraStarter\App\Http\Controllers\Admin\AdminController;

class AjaxController extends Controller
{
    public function index(){
        
        if(isset($_GET['action'])){

            switch($_GET['action']){
                case "load_user":
                    return AdminController::getUsers();
                break;
            }

        }elseif(isset($_POST['action'])){

        }

    }
}
