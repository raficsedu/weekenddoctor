<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\User;
use Mail;
use Auth;
use Session;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class DoctorController extends Controller
{
    function __construct()
    {
        // check if user is logged in or not, if not then redirect to loging page
        if(Auth::check()){

        }else{
            return redirect('/user-login');
        }
    }
}
