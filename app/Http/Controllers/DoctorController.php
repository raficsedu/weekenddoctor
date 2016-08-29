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

use App\DoctorMeta;
use App\Insurances;
use App\DoctorSchedule;
use App\Specialtiy;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use DateTime;

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

    public function appointments(){
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.doctor_appointment', ['insurances' => $insurances]);
    }

    public function schedule(){
        $user_id = Auth::user()->id;
        $insurances = Insurances::Select('id', 'name')->get();
        $schedules = get_doctor_schedules($user_id);
        return view('pages.doctor_schedule', ['insurances' => $insurances,'schedules' => $schedules]);
    }

    public function settings(){
        $specialty = Specialtiy::Select('id', 'name')->get();
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.doctor_settings', ['insurances' => $insurances,'specialties' => $specialty]);
    }

    public function get_time_slot(Request $request){
        $stime = $request->stime;
        $etime = $request->etime;
        $intval = $request->intval;
        $num = $request->num;

        $datetime1 = new DateTime($stime);
        $datetime2 = new DateTime($etime);
        $interval = $datetime1->diff($datetime2);
        $min = $interval->format('%i');
        $hour = $interval->format('%h');
        $total_min = $hour*60 + $min;
        $loop = $total_min / $intval;
        $html = '';
        for($l=0 ; $l <= $loop ; $l++){
            $time = date('G:i', strtotime($stime) + ($intval*60*$l));
            $time1 = date('h:i a', strtotime($stime) + ($intval*60*$l));
            $html .= '<input name="displayCheck'.$num.'[]" checked="checked" value="'.$time1.'" type="checkbox"> '.$time1.'<br>';
        }
        return $html;
    }

    public function save_doctor_schedule(Request $request){
        $user_id = Auth::user()->id;
        //Clear Previous data
        DB::table('doctor_schedules')->where('user_id', '=', $user_id)->delete();
        for($i=1;$i<=7;$i++){
            if($request->{"ischecked$i"}){
                $day = $i;
                $start_time = $request->{"stime$i"};
                $end_time = $request->{"etime$i"};
                $interval_time = $request->{"time$i"};
                $time_slots = serialize($request->{"displayCheck$i"});
                $created_at = date('Y-m-d H:i:s');

                //Insert Into DB
                DB::table('doctor_schedules')->insert(
                    ['user_id' => $user_id, 'day' => $day, 'start_time' => $start_time, 'end_time' => $end_time, 'interval_time' => $interval_time, 'time_slots' => $time_slots, 'created_at' => $created_at]
                );
            }
        }
        Session::put('successful', 'Working Schedule Has Been Updated');
        return redirect()->intended('/doctor/schedule');
    }

    public function passwordChange(Request $request)
    {

        if ($request->isMethod('post')) {
            $currentUser = Auth::user();
            $user_id = $currentUser->id;

            $current_password = $request->input('current_password');
            // dd(\Hash::make($current_password));
            // dd(\Hash::make($currentUser->password));
            $password = $request->input('password');
            $confirm_password = $request->input('confirm_password');
            if ($password == $confirm_password) {
                $existing_user_pass = User::where('id', $user_id)->first();
                if (!is_null($existing_user_pass)) {
                    if (\Hash::check($current_password, $currentUser->password)) {
                        $existing_user_pass->password = \Hash::make($password);
                        $existing_user_pass->updated_at = date('Y-m-d H:i:s');
                        $existing_user_pass->save();
                    } else {
                        return "Password Doesn't Match";
                    }
                } else {
                    return "Invalid User !!";
                }
            } else {
                return "Password Doesn't Match";
            }

        }
        $specialty = Specialtiy::Select('id', 'name')->get();
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.doctor_settings', ['insurances' => $insurances,'specialties' => $specialty]);
    }

    public function deactiveAccount(Request $request)
    {
     if ($request->isMethod('get')) {
         $currentUser = Auth::user();
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

            Session::put('successful', 'Thanks for deactive account! Please check your email and active again Or Create New Account');
            return redirect()->route('join_us');
         }

     }

    }

    public function doctorOfficeInfo(Request $request)
    {

        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
            $user_id = $currentUser->id;
            
            $fontEndKey = [
                "Doctor_Office_Address",
                "Doctor_Office_Area",
                "Doctor_Office_City",
                "Doctor_Office_State",
                "Doctor_Office_ZIP_code",
                "Doctor_Public_telephone",
                "Doctor_Mobile_telephone"
            ];
            $fontEndValue = [
                $request->input('Doctor_Office_Address'),
                $request->input('Doctor_Office_Area'),
                $request->input('Doctor_Office_City'),
                $request->input('Doctor_Office_State'),
                $request->input('Doctor_Office_ZIP_code'),
                $request->input('Doctor_Public_telephone'),
                $request->input('Doctor_Mobile_telephone')
            ];
            for ($i = 0; $i < sizeof($fontEndKey); $i++) {
                $existing_user_info = DoctorMeta::where('user_id', $user_id)->where('meta_key', $fontEndKey[$i])->first();
                if (is_null($existing_user_info)) {
                    $patient_info = new DoctorMeta;
                    $patient_info->user_id = $user_id;
                    $patient_info->meta_key = $fontEndKey[$i];
                    $patient_info->meta_value = $fontEndValue[$i];
                    $patient_info->save();
                } else {
                    $existing_user_info->user_id = $user_id;
                    $existing_user_info->meta_key = $fontEndKey[$i];
                    if ($fontEndValue[$i] != "") {
                        $existing_user_info->meta_value = $fontEndValue[$i];
                    }
                    $existing_user_info->save();
                }
            }
        }
        $specialty = Specialtiy::Select('id', 'name')->get();
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.doctor_settings', ['insurances' => $insurances,'specialties' => $specialty]);
    }
}
