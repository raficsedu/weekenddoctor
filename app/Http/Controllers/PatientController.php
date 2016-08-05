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

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class PatientController extends Controller {
    function __construct()
    {
            // check if user is logged in or not, if not then redirect to loging page
        if(Auth::check()){

        }else{
            return redirect('/user-login');
        }
    }

    public function settings(){
        $insurances = Insurances::Select('id','name')->get();
        return view('pages.settings',['insurances' =>$insurances ]);
    }

    public function patientProfile(Request $request){
        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
            $user_id = $currentUser->id;
            $date_of_birth = $request->input('birth_month')."/".$request->input('birth_date')."/".$request->input('birth_year');
            $fontEndKey =[  
            "Email",
            "Cell No",
            "Home Phone No",
            "Work Phone No",
            "Preferred Number",
            "Gender",
            "Date of Birth"
            ];
            $fontEndValue =[
            $request->input('email'),
            $request->input('cell'),
            $request->input('home'),
            $request->input('work'),
            $request->input('preferred_number'),
            $request->input('gender'),
            $date_of_birth
            ];
            for ($i=0; $i <sizeof($fontEndKey) ; $i++) { 
                $existing_user_info = PatientMeta::where('user_id', $user_id)->where('meta_key',$fontEndKey[$i])->first();
                if (is_null($existing_user_info)) {
                  $patient_info = new PatientMeta;
                  $patient_info->user_id =$user_id;
                  $patient_info->meta_key =$fontEndKey[$i];
                  $patient_info->meta_value =$fontEndValue[$i];
                  $patient_info->save();
              } else {
                  $existing_user_info->user_id =$user_id;
                  $existing_user_info->meta_key =$fontEndKey[$i];
                  if ($fontEndValue[$i] !="") {
                    if ($fontEndValue[$i] != "//") {
                       $existing_user_info->meta_value =$fontEndValue[$i];
                   }
               }
               $existing_user_info->save();
           }
       }
   }
   $insurances = Insurances::Select('id','name')->get();
        return view('pages.settings',['insurances' =>$insurances ]);
}
public function passwordChange(Request $request){

    if ($request->isMethod('post')) {
        $currentUser = Auth::user();
        $user_id = $currentUser->id;

        $current_password = $request->input('current_password');
        // dd(\Hash::make($current_password));
        // dd(\Hash::make($currentUser->password));
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        if($password == $confirm_password){
           $existing_user_pass = User::where('id', $user_id)->first();
           if (!is_null($existing_user_pass)) {
            if (\Hash::check($current_password, $currentUser->password)) {
               $existing_user_pass->password = \Hash::make($password);
               $existing_user_pass->updated_at = date('Y-m-d H:i:s');
               $existing_user_pass->save();
           }else{
            return "Password Doesn't Match";
        }
    }else{
        return "Invalid User !!";
    }
}else{
    return "Password Doesn't Match";
}

}
return view('pages.settings');
}
public function nottificationSettings(Request $request){
    //dd("aaaaaaaaaaaa");
    if ($request->isMethod('post')) {

        $currentUser = Auth::user();
        $user_id = $currentUser->id;
        $fontEndKey =[  
        "Wellness reminders",
        "Push notify appointment reminders",
        "Push notify if appointment is rescheduled or cancelled",
        "Push notify wellness reminders",
        ];
        $fontEndValue =[
        $request->input('wellness_reminders'),
        $request->input('appointment_reminders'),
        $request->input('is_rescheduled_or_cancelled'),
        $request->input('notify_wellness_reminders'),
        ];
        for ($i=0; $i <sizeof($fontEndKey) ; $i++) { 
            $existing_user_info = PatientMeta::where('user_id', $user_id)->where('meta_key',$fontEndKey[$i])->first();
            if (is_null($existing_user_info)) {
              $patient_info = new PatientMeta;
              $patient_info->user_id =$user_id;
              $patient_info->meta_key =$fontEndKey[$i];
              $patient_info->meta_value =$fontEndValue[$i];
              $patient_info->save();
          } else {
              $existing_user_info->user_id =$user_id;
              $existing_user_info->meta_key =$fontEndKey[$i];
              $existing_user_info->meta_value =$fontEndValue[$i];
              $existing_user_info->save();
          }
      }
  }
  $insurances = Insurances::Select('id','name')->get();
        return view('pages.settings',['insurances' =>$insurances ]);
}
}