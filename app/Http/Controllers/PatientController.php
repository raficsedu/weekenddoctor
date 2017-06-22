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
use App\PatientMeta;
use App\Insurances;
use App\Speciality;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class PatientController extends Controller
{
    function __construct()
    {
        // check if user is logged in or not, if not then redirect to loging page
        if (Auth::check()) {
        } else {
            return redirect('/user-login');
        }
    }

    public function patient_settings(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        $data['current_user'] = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
        $data['insurances'] = Insurances::Select('id', 'name')->get();
        $data['metas'] = get_patient_meta(Auth::user()->id);
        return view('pages.patient_settings', $data);
    }

    public function patient_medicalteam(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        $data['current_user'] = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
        $data['insurances'] = Insurances::Select('id', 'name')->get();
        $data['specialties'] = Speciality::Select('id', 'name')->get();
        //Getting My Appointments
        $data['appointments'] = DB::table('appointments')
            ->where('patient_id',$patient_id)
            ->where('appointment_date', '>=' , date('Y-m-d'))
            ->where('doctor_cancelled',0)
            ->where('patient_cancelled',0)
            ->get();

        return view('pages.patient_medicalteam', $data);
    }

    public function patient_appointments(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        $data['current_user'] = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
        $last_monday = date("Y-m-d", strtotime('last monday', strtotime('tomorrow')));
        $next_sunday = date("Y-m-d", strtotime("sunday"));

        $data['current_appointments'] = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.doctor_id')->where('appointments.patient_id','=',$patient_id)->whereBetween('appointments.appointment_date', [$last_monday, $next_sunday])->select('appointments.*','users.first_name','users.last_name','users.email')->get();
        $data['previous_appointments'] = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.doctor_id')->where('appointments.patient_id','=',$patient_id)->where('appointments.appointment_date','<',$last_monday)->get();
        $data['insurances'] = Insurances::Select('id', 'name')->get();

        return view('pages.patient_appointments', $data);
    }

    public function patientProfile(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;

        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
            $user_id = $patient_id;
            $date_of_birth = $request->input('birth_month') . "/" . $request->input('birth_date') . "/" . $request->input('birth_year');
            $fontEndKey = [
                "cell_no",
                "home_phone_no",
                "work_phone_no",
                "preferred_number",
                "gender",
                "date_of_birth"
            ];
            $fontEndValue = [
                $request->input('cell_no'),
                $request->input('home_phone_no'),
                $request->input('work_phone_no'),
                $request->input('preferred_number'),
                $request->input('gender'),
                $date_of_birth
            ];
            for ($i = 0; $i < sizeof($fontEndKey); $i++) {
                $existing_user_info = PatientMeta::where('user_id', $user_id)->where('meta_key', $fontEndKey[$i])->first();
                if (is_null($existing_user_info)) {
                    $patient_info = new PatientMeta;
                    $patient_info->user_id = $user_id;
                    $patient_info->meta_key = $fontEndKey[$i];
                    $patient_info->meta_value = $fontEndValue[$i];
                    $patient_info->save();
                } else {
                    $existing_user_info->user_id = $user_id;
                    $existing_user_info->meta_key = $fontEndKey[$i];
                    if ($fontEndValue[$i] != "") {
                        if ($fontEndValue[$i] != "//") {
                            $existing_user_info->meta_value = $fontEndValue[$i];
                        }
                    }
                    $existing_user_info->save();
                }
            }
        }

        Session::put('successful', 'Your Settings Successfully Saved');
        return redirect('/patient/settings?p='.$patient_id);
    }

    public function passwordChange(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        if ($request->isMethod('post')) {
            $currentUser = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
            $user_id = $currentUser->id;
            $current_set_password = $currentUser->password;

            $current_password = $request->input('current_password');
            $password = $request->input('password');
            $confirm_password = $request->input('confirm_password');

            //Checking for the current Password Match
            if(Hash::check($current_password, $current_set_password)){
                // The passwords match...
                if ($password == $confirm_password) {
                    $existing_user_pass = User::where('id', $user_id)->first();
                    $existing_user_pass->password = \Hash::make($password);
                    $existing_user_pass->updated_at = date('Y-m-d H:i:s');
                    $existing_user_pass->save();

                    Session::put('successful', 'Your Password Successfully Changed');
                    return redirect('/patient/settings?p='.$patient_id);
                } else {
                    Session::put('unsuccessful', 'Your Password and Confirm Password Didn\'t Match');
                    return redirect('/patient/settings?p='.$patient_id);
                }
            }else{
                Session::put('unsuccessful', 'Your Current Password Didn\'t Match');
                return redirect('/patient/settings?p='.$patient_id);
            }

        }
    }

    public function notificationSettings(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        if ($request->isMethod('post')) {

            $currentUser = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
            $user_id = $currentUser->id;
            $fontEndKey = [
                "Wellness reminders",
                "Push notify appointment reminders",
                "Push notify if appointment is rescheduled or cancelled",
                "Push notify wellness reminders",
            ];
            $fontEndValue = [
                $request->input('wellness_reminders'),
                $request->input('appointment_reminders'),
                $request->input('is_rescheduled_or_cancelled'),
                $request->input('notify_wellness_reminders'),
            ];
            for ($i = 0; $i < sizeof($fontEndKey); $i++) {
                $existing_user_info = PatientMeta::where('user_id', $user_id)->where('meta_key', $fontEndKey[$i])->first();
                if (is_null($existing_user_info)) {
                    $patient_info = new PatientMeta;
                    $patient_info->user_id = $user_id;
                    $patient_info->meta_key = $fontEndKey[$i];
                    $patient_info->meta_value = $fontEndValue[$i];
                    $patient_info->save();
                } else {
                    $existing_user_info->user_id = $user_id;
                    $existing_user_info->meta_key = $fontEndKey[$i];
                    $existing_user_info->meta_value = $fontEndValue[$i];
                    $existing_user_info->save();
                }
            }
        }
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.settings', ['insurances' => $insurances]);
    }

    public function insuranceSettings(Request $request)
    {
        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        if ($request->isMethod('post')) {

            $currentUser = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
            $user_id = $currentUser->id;
            $fontEndKey = [
                "medical_insurance",
                "dental_insurance",
                "vision_insurance"
            ];
            $fontEndValue = [
                $request->input('medical_insurance'),
                $request->input('dental_insurance'),
                $request->input('vision_insurance')
            ];
            for ($i = 0; $i < sizeof($fontEndKey); $i++) {
                $existing_user_info = PatientMeta::where('user_id', $user_id)->where('meta_key', $fontEndKey[$i])->first();
                if (is_null($existing_user_info)) {
                    $patient_info = new PatientMeta;
                    $patient_info->user_id = $user_id;
                    $patient_info->meta_key = $fontEndKey[$i];
                    $patient_info->meta_value = $fontEndValue[$i];
                    $patient_info->save();
                } else {
                    $existing_user_info->user_id = $user_id;
                    $existing_user_info->meta_key = $fontEndKey[$i];
                    $existing_user_info->meta_value = $fontEndValue[$i];
                    $existing_user_info->save();
                }
            }
        }
        Session::put('successful', 'Your Insurance Settings Successfully Changed');
        return redirect('/patient/settings?p='.$patient_id);
    }

    public function demographicSettings(Request $request)
    {

        $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
        if ($request->isMethod('post')) {

            $currentUser = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
            $user_id = $currentUser->id;
            $fontEndKey = [
                "American Indian or Alaska Native",
                "Asian",
                "Black or African American",
                "Native Hawaiian",
                "Other Pacific Islander",
                "White",
                "Other",
                "Decline to Answer",
                "Hispanic or Latino ",
                "Not Hispanic or Latino",
                "Decline to Answer",
                "preferred Language",
                "zip Optional"
            ];
            $fontEndValue = [
                $request->input('american_indian_or_alaska_native'),
                $request->input('asian'),
                $request->input('black_or_african_american'),
                $request->input('native_hawaiian'),
                $request->input('other_pacific_islander'),
                $request->input('white'),
                $request->input('other'),
                $request->input('decline_to_answer'),
                $request->input('hispanic_or_latino'),
                $request->input('not_hispanic_or_latino'),
                $request->input('decline_to_answe'),
                $request->input('preferred_language'),
                $request->input('zip_optional'),
            ];
            for ($i = 0; $i < sizeof($fontEndKey); $i++) {
                $existing_user_info = PatientMeta::where('user_id', $user_id)->where('meta_key', $fontEndKey[$i])->first();
                if (is_null($existing_user_info)) {
                    $patient_info = new PatientMeta;
                    $patient_info->user_id = $user_id;
                    $patient_info->meta_key = $fontEndKey[$i];
                    $patient_info->meta_value = $fontEndValue[$i];
                    $patient_info->save();
                } else {
                    $existing_user_info->user_id = $user_id;
                    $existing_user_info->meta_key = $fontEndKey[$i];
                    $existing_user_info->meta_value = $fontEndValue[$i];
                    $existing_user_info->save();
                }
            }
        }
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.settings', ['insurances' => $insurances]);
    }
     public function deactiveAccount(Request $request)
     {
         $patient_id = $data['patient_id'] = ($request->p) ? $request->p : Auth::user()->id;
         if ($request->isMethod('get')) {
             $currentUser = ($request->p) ? DB::table('users')->where('id',$patient_id)->first() : Auth::user();
             $user_id = $currentUser->id;
             $user = User::where('id',$user_id)->where('active',1)->count();
             if ($user > 0) {
                $confirmation_code = str_random(10);
                $user_acc = User::where('id',$user_id)->where('active',1)->first();
                $user_acc ->verification_code = $confirmation_code;
                $user_acc ->active = 0;
                $user_acc->save();
                //Sending Confirmation Email
                $data['email'] = $user_acc->email;
                $data['user_level'] =  $user_acc->user_level;
                $data['name'] =  $user_acc->first_name . ' ' .  $user_acc->last_name;
                $data['user_id'] = $user_id;
                $data['confirmation_code'] = $confirmation_code;

                $data['s_info'] = get_system_info();

                Mail::send(['html' => 'email.deactive'], $data, function ($m) use ($data) {
                    $m->from($data['s_info']['email'], $data['s_info']['name']);

                    $m->to($data['email'], $data['name'])->subject('Please verify your email');
                });

                Session::put('successful', 'Thanks for deactive account! Please check your email and active again');
                return redirect()->route('join_us');
             }

         }
    }

    public function patient_medical_search(Request $request){
        $cat_id = $request->cat_id;
        $data['doctors'] = DB::table('users')
            ->select('users.*')
            ->join('doctor_metas', 'users.id', '=', 'doctor_metas.user_id')
            ->where('users.active',1)
            ->where('users.user_level',2)
            ->where('doctor_metas.meta_key','speciality')
            ->where('doctor_metas.meta_value',$cat_id)
            ->distinct()
            ->get();

        if(sizeof($data['doctors'])){
            //Making Data for the Map
            foreach($data['doctors'] as $k=> $d){
                $meats = get_doctor_meta($d->id);
                $data['locations'][$k]['lat'] = $meats['lat'];
                $data['locations'][$k]['long'] = $meats['lng'];
                $data['locations'][$k]['info'] = '<a href="'.url('doctor/'.$d->id).'">'.$d->first_name." ".$d->last_name.'</a>';
                if(isset($meats['speciality'])){
                    $data['locations'][$k]['info'] .= "<br>".get_specialty($meats['speciality']);
                }
            }
        }else{
            $data['locations'] = array();
        }

        return view('pages.medical_group',$data);
    }
}