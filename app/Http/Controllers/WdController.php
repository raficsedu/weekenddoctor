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

        return view('pages.medical_group',$data);
    }

    public function book_appointment(Request $request)
    {
        $data['insurances'] = Insurances::Select('id', 'name')->get();
        $data['doctor'] = User::find($request->doctor_id);
        $data['metas'] = get_doctor_meta($request->doctor_id);
        $data['date'] = $request->date;
        $data['time'] = $request->time;

        return view('pages.book_appointment',$data);
    }

    public function confirm_booking(Request $request){
        //Checking for the User logged in or Not
        if (Auth::check()) {
        } else {
            return redirect('/user-login');
        }

        $doctor_id = $request->doctor_id;
        $data['metas'] = get_doctor_meta($request->doctor_id);
        $doctor = User::find($doctor_id);
        $data['doctor_name'] = $doctor_name = $doctor->first_name.' '.$doctor->last_name;
        $data['doctor_email'] = $doctor->email;
        $patient_id = Auth::user()->id;
        $data['patient_name'] = $patient_name = Auth::user()->first_name.' '.Auth::user()->last_name;
        $data['patient_email'] = Auth::user()->email;
        $data['date'] = $date = $request->date;
        $data['time'] = $time = $request->time;
        $data['reason'] = $reason = $request->reason;
        $insurance = $request->insurance;
        $patient_type = $request->patient_type;

        //Checking for the Entry already exist or not
        $checking = DB::table('appointments')
                    ->where('doctor_id','=',$doctor_id)
                    ->where('patient_id','=',$patient_id)
                    ->where('appointment_date','=',$date)
                    ->where('appointment_time','=',$time)
                    ->first();
        if($checking){
            $data['status'] = 0;
            $data['date'] = $date = getUSdateformat($request->date);
            return view('pages.booking-result',$data);
        }else{
            //Inserting into Database
            DB::table('appointments')->insert(
                ['doctor_id' => $doctor_id, 'patient_id' => $patient_id, 'appointment_date' => $date, 'appointment_time' => $time, 'insurance' => $insurance, 'reason' => $reason, 'patient_type' => $patient_type, 'created_at' => date('Y-m-d H:i:s')]
            );

            //Sending Emails to both doctor and patient
            $data['s_info'] = get_system_info();
            $data['date'] = $date = getUSdateformat($request->date);
            Mail::send(['html' => 'email.patient-booking'], $data, function ($m) use ($data) {
                $m->from($data['s_info']['email'], $data['s_info']['name']);

                $m->to($data['patient_email'], $data['patient_name'])->subject('Your Appointment Details in WeekendDocs');
            });

            Mail::send(['html' => 'email.doctor-booking'], $data, function ($m) use ($data) {
                $m->from($data['s_info']['email'], $data['s_info']['name']);

                $m->to($data['doctor_email'], $data['doctor_name'])->subject('Your Received a booking in WeekendDocs');
            });

            //Sending View
            $data['status'] = 1;
            return view('pages.booking-result',$data);
        }
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
        $appointments = get_my_appointments(2,date("Y-m-d", strtotime("saturday")));
        print_r($appointments);
        die();
        $data['email'] = 'raficsedu@gmail.com';
        $data['name'] = 'Md Muntasir Rahman';
        $data['user_id'] = 11;
        $data['password'] = 'sefufiube';
        $data['user_level'] = 1;
        $data['confirmation_code'] = 'sefigsei';
        $data['s_info'] = get_system_info();
//
//        Mail::send(['html' => 'email.test'], $data, function ($m) use ($data) {
//            $m->from($data['s_info']['email'], $data['s_info']['name']);
//            $m->to($data['email'], $data['name'])->subject('Please verify your email');
//        });

        return view('email.test',$data);
    }
}
