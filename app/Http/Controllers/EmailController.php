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
        $user_level = $request->user_level;

        $is_already_confirmed = User::where('id', '=',$user_id)
            ->where('verification_code','=', $confirmation_code)
            ->where('active','=', 1)
            ->count();

        if ($is_already_confirmed > 0){
            Auth::loginUsingId($user_id);
            if($user_level==1){
                return redirect()->route('patient_medicalteam');
            }else{
                return redirect()->route('doctor_appointments');
            }
        }

        $verify_user = User::where('id', '=',$user_id)
                        ->where('verification_code','=', $confirmation_code)
                        ->where('active','=', 0)
                        ->count();

        if($verify_user > 0){
            DB::table('users')
                ->where('id', $user_id)
                ->update(['active' => 1]);

            Session::put('successful', 'Congratulation !!! Your account verified successfully');
            Auth::loginUsingId($user_id);
            if($user_level==1){
                return redirect()->route('patient_medicalteam');
            }else{
                return redirect()->route('doctor_appointments');
            }
        }else{
            if ($user_level == 1) {
                Session::put('unsuccessful', 'Create a new account to get started');
                return redirect()->route('join_us');
            } else {
                Session::put('unsuccessful', 'Create a new account to get started');
                return redirect()->route('get_started');
            }
        }
    }
}
