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

class EmailController extends Controller
{
    public function email_verify(Request $request){
        $user_id = $request->user_id;
        $confirmation_code = $request->confirmation_code;
        $user_level =$request->user_level;
        $verify_user = User::where('id', '=',$user_id)
                        ->where('verification_code','=', $confirmation_code)
                        ->where('active','=', 0)
                        ->count();

        if($verify_user > 0){
            DB::table('users')
                ->where('id', $user_id)
                ->update(['active' => 1]);

            Session::put('message', 'Congratulation !!! Your account verified successfully , Login to continue');
            return redirect()->route('user_login');
        }else{
            if ($user_level == 1) {
                Session::put('message', 'Create a new account to get started');
            return redirect()->route('join_us');
            } else {
                Session::put('message', 'Create a new account to get started');
            return redirect()->route('get_started');
            }
            
            
        }
    }
}
