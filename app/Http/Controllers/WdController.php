<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Insurances;
use App\Speciality;
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
        $data['specialities'] = Speciality::Select('id', 'name')->get();
        $data['insurances'] = Insurances::Select('id', 'name')->get();
        return view('pages.home',$data);
    }

    public function dashboard()
    {
        return view('welcome');
    }

    public function how_it_works()
    {
        return view('pages.how_it_works');
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

    public function medical_search(Request $request)
    {
        $data['speciality'] = $speciality = $request->speciality;
        $data['city_zip'] = $city_zip = $request->city_zip;
        $data['insurance'] = $insurance = $request->insurance;

        $data['doctors'] = DB::table('users')
            ->join('doctor_metas', 'users.id', '=', 'doctor_metas.user_id')
            ->where('users.active', '=', 1)
            ->where('users.user_level', '=', 2)
            ->where('doctor_metas.meta_value', 'like', '%'.$city_zip.'%')
            ->select('users.*')
            ->distinct()
            ->get();

        return view('pages.medical_search',$data);
    }

    public function book_appointment()
    {
        return view('pages.book_appointment');
    }

    public function send_email(){
        $data['email'] = 'raficsedu@gmail.com';
        $data['name'] = 'Md Muntasir Rahman';
        $data['user_id'] = 11;
        $data['password'] = '';
        $data['user_level'] = 1;
        $data['confirmation_code'] = 'sefigsei';

        Mail::send(['html' => 'email.verify'], $data, function ($m) use ($data) {
            $m->from('michael@syntelex.com', 'Weekend Doctor');

            $m->to($data['email'], $data['name'])->subject('Please verify your email');
        });
    }

    public function test(){
//        $data['email'] = 'raficsedu@gmail.com';
//        $data['name'] = 'Md Muntasir Rahman';
//        $data['user_id'] = 11;
//        $data['password'] = 'sefufiube';
//        $data['user_level'] = 1;
//        $data['confirmation_code'] = 'sefigsei';
//        $data['s_info'] = get_system_info();
//
//        Mail::send(['html' => 'email.test'], $data, function ($m) use ($data) {
//            $m->from($data['s_info']['email'], $data['s_info']['name']);
//            $m->to($data['email'], $data['name'])->subject('Please verify your email');
//        });

        $metas = \Hash::make('45446666');
        print_r($metas);

//        return view('email.test',$data);
    }
}
