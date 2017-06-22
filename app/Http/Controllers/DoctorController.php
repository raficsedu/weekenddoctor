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
use App\Speciality;

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

    public function appointments(Request $request){
        $doctor_id = $data['doctor_id'] = ($request->d) ? $request->d : Auth::user()->id;
        $data['current_user'] = ($request->d) ? DB::table('users')->where('id',$doctor_id)->first() : Auth::user();

        $last_monday = date("Y-m-d", strtotime('last monday', strtotime('tomorrow')));
        $next_sunday = date("Y-m-d", strtotime("sunday"));

        $data['current_appointments'] = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.patient_id')->where('appointments.doctor_id','=',$doctor_id)->whereBetween('appointments.appointment_date', [$last_monday, $next_sunday])->select('appointments.*','users.first_name','users.last_name','users.email')->get();
        $data['previous_appointments'] = DB::table('appointments')->join('users', 'users.id', '=', 'appointments.patient_id')->where('appointments.doctor_id','=',$doctor_id)->where('appointments.appointment_date','<',$last_monday)->get();
        $data['insurances'] = Insurances::Select('id', 'name')->get();

        return view('pages.doctor_appointment', $data);
    }

    public function schedule(Request $request){
        $doctor_id = $data['doctor_id'] = ($request->d) ? $request->d : Auth::user()->id;
        $data['current_user'] = ($request->d) ? DB::table('users')->where('id',$doctor_id)->first() : Auth::user();

        $data['insurances'] = Insurances::Select('id', 'name')->get();
        $data['schedules'] = get_doctor_schedules($doctor_id);
        $data['off_days'] = get_doctor_off_days($doctor_id);

        return view('pages.doctor_schedule', $data);
    }

    public function settings(Request $request){
        $doctor_id = $data['doctor_id'] = ($request->d) ? $request->d : Auth::user()->id;
        $data['current_user'] = ($request->d) ? DB::table('users')->where('id',$doctor_id)->first() : Auth::user();

        $data['specialties'] = Speciality::Select('id', 'name')->get();
        $data['insurances'] = Insurances::Select('id', 'name')->get();
        $data['metas'] = get_doctor_meta($doctor_id);
        return view('pages.doctor_settings', $data);
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
        $doctor_id = ($request->d) ? $request->d : Auth::user()->id;
        //Clear Previous data
        DB::table('doctor_schedules')->where('user_id', '=', $doctor_id)->delete();
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
                    ['user_id' => $doctor_id, 'day' => $day, 'start_time' => $start_time, 'end_time' => $end_time, 'interval_time' => $interval_time, 'time_slots' => $time_slots, 'created_at' => $created_at]
                );
            }
        }
        Session::put('successful', 'Working Schedule Has Been Updated');
        return redirect('/doctor/schedule?d='.$doctor_id);
    }

    public function passwordChange(Request $request)
    {
        $doctor_id = ($request->d) ? $request->d : Auth::user()->id;
        if ($request->isMethod('post')) {
            $currentUser = ($request->d) ? DB::table('users')->where('id',$doctor_id)->first() : Auth::user();
            $user_id = $doctor_id;
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
                    return redirect('/doctor/settings?d='.$doctor_id);
                } else {
                    Session::put('unsuccessful', 'Your Password and Confirm Password Didn\'t Match');
                    return redirect('/doctor/settings?d='.$doctor_id);
                }
            }else{
                Session::put('unsuccessful', 'Your Current Password Didn\'t Match');
                return redirect('/doctor/settings?d='.$doctor_id);
            }
        }
    }

    public function deactiveAccount(Request $request)
    {
        $doctor_id = ($request->d) ? $request->d : Auth::user()->id;
         if ($request->isMethod('get')) {
             $currentUser = Auth::user();
             $user_id = $doctor_id;
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

                Session::put('successful', 'Your account de-activated! Please check your email and active again Or Create New Account');
                return redirect()->route('join_us');
             }
         }
    }

    public function doctorOfficeInfo(Request $request)
    {
        $doctor_id = ($request->d) ? $request->d : Auth::user()->id;
        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
            $user_id = $doctor_id;

            $fontEndKey = [
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

        Session::put('successful', 'Your Office Information Successfully Saved');
        return redirect('/doctor/settings?d='.$doctor_id);
    }

    public function insert_off_day(Request $request){
        $temp = explode('-',$request->date);
        $data['us_date'] = $request->date;
        $temp2 = $temp[2].'-'.$temp[0].'-'.$temp[1];
        $date = new DateTime($temp2);
        $data['date'] = $date->format('l jS \of F Y');
        $user_id = ($request->d) ? $request->d : Auth::user()->id;
        $total_off_days = DB::table('doctor_off_days')->where('user_id',$user_id )->count();
        $data['i'] = $total_off_days + 8;

        return view('ajax_view.doctor_off_time', $data);
    }

    public function save_off_days(Request $request){
        $user_id = ($request->d) ? $request->d : Auth::user()->id;

        $i = $request->form_item_no;
        $date = $this->getDBdateformat($request->us_date);

        $full_day = ($request->{"ischecked$i"}=='whole') ? 1 : 0;
        $start_time = $request->{"stime$i"};
        $end_time = $request->{"etime$i"};
        $interval_time = $request->{"time$i"};
        $time_slots = serialize($request->{"displayCheck$i"});
        $created_at = date('Y-m-d H:i:s');

        //Clear Previous data
        $res = DB::table('doctor_off_days')->where('user_id', '=', $user_id)->where('date', '=', $date)->first();

        if($res){
            //Updating Into DB
            DB::table('doctor_off_days')
                ->where('id', $res->id)
                ->update(['full_day' => $full_day,'start_time' => $start_time, 'end_time' => $end_time, 'interval_time' => $interval_time, 'time_slots' => $time_slots, 'updated_at' => $created_at]);
        }else{
            //Insert Into DB
            DB::table('doctor_off_days')->insert(
                ['user_id' => $user_id, 'date' => $date,'full_day' => $full_day,'start_time' => $start_time, 'end_time' => $end_time, 'interval_time' => $interval_time, 'time_slots' => $time_slots, 'created_at' => $created_at]
            );
        }

        return 1;
    }

    public function delete_off_days(Request $request){
        $user_id = ($request->d) ? $request->d : Auth::user()->id;
        $date = $this->getDBdateformat($request->us_date);

        //Clear deleted data
        DB::table('doctor_off_days')->where('user_id', '=', $user_id)->where('date', '=', $date)->delete();

        return 1;
    }

    public function getDBdateformat($date=''){
        $temp = explode('-',$date);
        $date = $temp[2].'-'.$temp[0].'-'.$temp[1];
        return $date;
    }

    public function save_doctor_settings(Request $request){
        $doctor_id = ($request->d) ? $request->d : Auth::user()->id;

        //Handling Profile Picture
        if($request->profile_image!=''){
            $file_extension = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
            $img_name = time().".".$file_extension;
            $request->file('profile_image')->move('public/uploads/doctor', $img_name);
        }else{
            $img_name = $request->current_profile_image;
        }

        //Handling Insurances
        $insurances = $request->insurance;
        $insurance = ',';
        if(sizeof($insurances)>0){
            foreach($insurances as $i){
                $insurance .= $i.',';
            }
        }

        //Making array of Metas
        $metas = array(
            'profile_image' => $img_name,
            'doctor_title' => $request->doctor_title,
            'speciality' => $request->speciality,
            'education' => $request->education,
            'hospital_affiliation' => $request->hospital_affiliation,
            'language_spoken' => $request->language_spoken,
            'award_and_publications' => $request->award_and_publications,
            'professional_membership' => $request->professional_membership,
            'insurance' => $insurance,
            'professional_statement' => $request->professional_statement,
            'board_certification' => $request->board_certification
        );

        //Inserting into DB
        foreach($metas as $key => $meta){
            update_meta('doctor_metas',$doctor_id,$key,$meta);
        }

        Session::put('successful', 'Your Settings Successfully Saved');
        return redirect('/doctor/settings?d='.$doctor_id);
    }

    public function doctor_profile(Request $request){
        $doctor_id = $request->id;
        $data['doctor_info'] = DB::table('users')->where('id',$doctor_id)->first();
        $data['doctor_metas'] = get_doctor_meta($doctor_id);
        return view('pages.doctor_profile',$data);
    }
}
