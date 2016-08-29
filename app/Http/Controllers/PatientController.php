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

    public function patient_settings()
    {
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.patient_settings', ['insurances' => $insurances]);
    }

    public function patient_medicalteam()
    {
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.patient_medicalteam', ['insurances' => $insurances]);
    }

    public function patient_appointments()
    {
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.patient_appointments', ['insurances' => $insurances]);
    }

    public function patientProfile(Request $request)
    {
        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
            $user_id = $currentUser->id;
            $date_of_birth = $request->input('birth_month') . "/" . $request->input('birth_date') . "/" . $request->input('birth_year');
            $fontEndKey = [
                "Email",
                "Cell No",
                "Home Phone No",
                "Work Phone No",
                "Preferred Number",
                "Gender",
                "Date of Birth"
            ];
            $fontEndValue = [
                $request->input('email'),
                $request->input('cell'),
                $request->input('home'),
                $request->input('work'),
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
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.settings', ['insurances' => $insurances]);
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
        return view('pages.settings');
    }

    public function notificationSettings(Request $request)
    {
        //dd("aaaaaaaaaaaa");
        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
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

        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
            $user_id = $currentUser->id;
            $fontEndKey = [
                "Medical Insurance",
                "Dental Insurance",
                "Vision Insurance"
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
        $insurances = Insurances::Select('id', 'name')->get();
        return view('pages.settings', ['insurances' => $insurances]);
    }

    public function demographicSettings(Request $request)
    {
        //  dd($request->all());

        if ($request->isMethod('post')) {

            $currentUser = Auth::user();
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

            Session::put('successful', 'Thanks for deactive account! Please check your email and active again');
            return redirect()->route('join_us');
         }

     }

    }

}