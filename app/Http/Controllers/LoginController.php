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

class LoginController extends Controller
{

    public function user_login()
    {
        return view('pages.user_login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        if (Auth::attempt(['email' => $email, 'password' => $password,'active' => 1],$remember)) {
            // Authentication passed...
            $user = Auth::user();
            if($user->user_level==1){
                return redirect()->route('patient_medicalteam');
            }else{
                return redirect()->route('doctor_appointments');
            }
        }else{
            Session::put('unsuccessful', 'Your Email or Password is incorrect');
            return redirect()->intended('/user-login');
        }
    }
}
