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
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.doctor_settings', ['insurances' => $insurances]);
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
}
