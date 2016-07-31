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

class WdController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function dashboard()
    {
        return view('welcome');
    }

    public function how_it_works()
    {
        return view('pages.how_it_works');
    }

    public function join_us()
    {
        return view('pages.join_us');
    }

    public function list_your_practice()
    {
        return view('pages.list_your_practice');
    }

    public function medical_group()
    {
        return view('pages.medical_group');
    }

    public function authorization()
    {
        return view('pages.authorization');
    }

    public function doctor_profile()
    {
        return view('pages.doctor_profile');
    }

    public function settings()
    {
        return view('pages.settings');
    }

    public function get_started()
    {
        return view('pages.get_started');
    }

    public function medical_search()
    {
        return view('pages.medical_search');
    }

    public function book_appointment()
    {
        return view('pages.book_appointment');
    }

    public function user_login()
    {
        return view('pages.user_login');
    }

    public function registration(Request $request)
    {
        if ($request->isMethod('post')) {

            $existing_user = User::where('email', $request->email)->count();
            if($existing_user > 0)
            {
                Session::put('message', 'Account already exists');
                return Redirect('/join-us');
            }

            $confirmation_code = str_random(10);
            $user_level = intval($request->input('registration_type'));
            $email = $request->input('email');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $password = $request->input('password');

            DB::table('users')->insert(
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

            $data = ['confirmation_code' => $confirmation_code];
            $data = ['email' => $email];

//            Mail::send('email.verify', $data, function ($m) use ($request) {
//                $m->to($email,$first_name  . $last_name)->subject('Thank you for registering with us!')
//                    ->sender('raficsedu@gmail.com');
//            });

            Flash::message('Thanks for signing up! Please check your email.');
            return redirect()->route('/join-us');

        }
        return view('pages.join_us');
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;
        if (Auth::attempt(['email' => $email, 'password' => $password],$remember)) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }else{
            Session::put('message', 'Your Email or Password is incorrect');
            return redirect()->intended('/user-login');
        }
    }

    public function send_email(){
        $user['email'] = 'noshinnu@gmail.com';
        $user['name'] = 'Arefin';

        Mail::send('email.test', ['user' => $user], function ($m) use ($user) {
            $m->from('raficsedu@gmail.com', 'Weekend Doctor');

            $m->to($user['email'], $user['name'])->subject('Your Reminder!');
        });
    }
	
	public function raad(){
		echo 'Raad';
	}
}
