<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Speciality;
use App\DoctorMeta;
use App\User;
use Mail;
use Auth;
use Session;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class RegistrationController extends Controller
{

    public function join_us()
    {
        return view('pages.join_us');
    }

    public function get_started()
    {
        $specialty = Speciality::Select('id', 'name')->get();
        //dd($specialty);
        return view('pages.get_started', ['specialties' => $specialty]);
    }

    public function patient_registration(Request $request)
    {
        if ($request->isMethod('post')) {

            $existing_user = User::where('email', $request->email)->count();
            if ($existing_user > 0) {
                if(Auth::check()){
                    Session::put('unsuccessful', 'Account already exists');
                    return redirect()->route('add_patient');
                }else{
                    Session::put('unsuccessful', 'Account already exists');
                    return Redirect('/join-us');
                }

            }

            $confirmation_code = str_random(10);
            $user_level = intval($request->input('registration_type'));
            $email = $request->input('email');
            $first_name = ucfirst($request->input('first_name'));
            $last_name = $request->input('last_name');
            $password = $request->input('password');

            $user_id = DB::table('users')->insertGetId(
                ['first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => \Hash::make($password),
                    'remember_token' => $request->input('_token'),
                    'verification_code' => $confirmation_code,
                    'active' => 0,
                    'user_level' => $user_level,
                    'created_at' => date('Y-m-d H:i:s'),]
            );

            //Sending Confirmation Email
            $data['email'] = $email;
            $data['password'] = null;
            $data['user_level'] = $user_level;
            $data['name'] = $name = $first_name . ' ' . $last_name;
            $data['user_id'] = $user_id;
            $data['confirmation_code'] = $confirmation_code;

            $data['s_info'] = get_system_info();

            Mail::send(['html' => 'email.patient_verify'], $data, function ($m) use ($data) {
                $m->from($data['s_info']['email'], $data['s_info']['name']);

                $m->to($data['email'], $data['name'])->subject('Please verify your email');
            });

            if(Auth::check()){
                $message = "Patient Successfully Created";
                Session::put('successful',$message );
                return redirect()->route('add_patient');
            }else{
                $message = "Thank You for signing up! Please check your email and verify your account.";
                Session::put('successful',$message );
                return redirect()->route('join_us');
            }

        }
        return view('pages.join_us');
    }

    public function doctor_registration(Request $request)
    {
        if ($request->isMethod('post')) {

            $existing_user = User::where('email', $request->email)->count();
            if ($existing_user > 0) {
                if(Auth::check()){
                    Session::put('unsuccessful', 'Account already exists');
                    return Redirect('/add-doctor');
                }else{
                    Session::put('unsuccessful', 'Account already exists');
                    return Redirect('/get-started');
                }
            }

            $confirmation_code = str_random(10);
            $user_level = intval($request->input('registration_type'));
            $email = $request->input('email');
            $first_name = ucfirst($request->input('first_name'));
            $last_name = $request->input('last_name');
            $password = str_random(8);
            $fontEndKey = [
                "speciality",
                "phone",
                "lat",
                "lng",
                "zip",
                "city",
                "area",
                "region",
                "country",
                "address"
            ];
            $fontEndValue = [
                $request->input('specialty'),
                $request->input('phone'),
                $request->input('lat'),
                $request->input('lng'),
                $request->input('zip'),
                $request->input('city'),
                $request->input('area'),
                $request->input('region'),
                $request->input('country'),
                $request->input('address'),
            ];

            $user_id = DB::table('users')->insertGetId(
                ['first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'password' => \Hash::make($password),
                    'remember_token' => $request->input('_token'),
                    'verification_code' => $confirmation_code,
                    'active' => 0,
                    'user_level' => $user_level,
                    'created_at' => date('Y-m-d H:i:s'),]
            );

            //Default Schedule
            DB::table('doctor_schedules')->insert([
                ['user_id' => $user_id, 'day' => 6, 'start_time' => '9:00', 'end_time' => '17:00', 'interval_time' => 30, 'time_slots' => 'a:17:{i:0;s:8:"09:00 am";i:1;s:8:"09:30 am";i:2;s:8:"10:00 am";i:3;s:8:"10:30 am";i:4;s:8:"11:00 am";i:5;s:8:"11:30 am";i:6;s:8:"12:00 pm";i:7;s:8:"12:30 pm";i:8;s:8:"01:00 pm";i:9;s:8:"01:30 pm";i:10;s:8:"02:00 pm";i:11;s:8:"02:30 pm";i:12;s:8:"03:00 pm";i:13;s:8:"03:30 pm";i:14;s:8:"04:00 pm";i:15;s:8:"04:30 pm";i:16;s:8:"05:00 pm";}', 'created_at' => date('Y-m-d H:i:s')],
                ['user_id' => $user_id, 'day' => 7, 'start_time' => '9:00', 'end_time' => '17:00', 'interval_time' => 30, 'time_slots' => 'a:17:{i:0;s:8:"09:00 am";i:1;s:8:"09:30 am";i:2;s:8:"10:00 am";i:3;s:8:"10:30 am";i:4;s:8:"11:00 am";i:5;s:8:"11:30 am";i:6;s:8:"12:00 pm";i:7;s:8:"12:30 pm";i:8;s:8:"01:00 pm";i:9;s:8:"01:30 pm";i:10;s:8:"02:00 pm";i:11;s:8:"02:30 pm";i:12;s:8:"03:00 pm";i:13;s:8:"03:30 pm";i:14;s:8:"04:00 pm";i:15;s:8:"04:30 pm";i:16;s:8:"05:00 pm";}', 'created_at' => date('Y-m-d H:i:s')]
            ]);

            for ($i = 0; $i < sizeof($fontEndKey); $i++) {
                DB::table('doctor_metas')->insertGetId(
                    ['user_id' => $user_id,
                        'meta_key' => $fontEndKey[$i],
                        'meta_value' => $fontEndValue[$i],]
                );
            }
            //Sending Confirmation Email
            $data['email'] = $email;
            $data['name'] = $name = $first_name . ' ' . $last_name;
            $data['user_id'] = $user_id;
            $data['confirmation_code'] = $confirmation_code;
            $data['password'] = $password;
            $data['user_level'] = $user_level;

            $data['s_info'] = get_system_info();

            Mail::send(['html' => 'email.doctor_verify'], $data, function ($m) use ($data) {
                $m->from($data['s_info']['email'], $data['s_info']['name']);
                $m->to($data['email'], $data['name'])->subject('Please verify your email');
            });

            if(Auth::check()){
                $message = "Doctor has been successfully created";
                Session::put('successful',$message );
                return redirect()->route('add_doctor');
            }else{
                $message = "Thank you for your information,  ($name)! Please check your email to verify your account";
                Session::put('successful',$message );
                return redirect()->route('get_started');
            }

        }
        return view('pages.get_started');
    }

    public function admin_register(Request $request){
        $email = $request->email;
        $password = $request->password;
        $code = $request->code;

        //Checking for the Security Code
        if($code !='#weekenddocs#'){
            Session::put('unsuccessful', 'Security code doesn\'t match');
            return Redirect('/register');
        }
        //Checking for the Existing User
        $existing_user = User::where('email', $request->email)->count();
        if ($existing_user > 0) {
            Session::put('unsuccessful', 'Account already exists');
            return Redirect('/register');
        }

        $first_name = ucfirst($request->input('f_name'));
        $last_name = ucfirst($request->input('l_name'));

        $user_id = DB::table('users')->insertGetId(
            ['first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => \Hash::make($password),
                'remember_token' => $request->input('_token'),
                'verification_code' => '',
                'active' => 1,
                'user_level' => 3,
                'created_at' => date('Y-m-d H:i:s'),]
        );

        $message = "Your Admin Registration Successfully Completed";
        Session::put('successful',$message );
        return Redirect('/register');
    }
}