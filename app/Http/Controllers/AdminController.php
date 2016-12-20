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

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['specialities'] = Speciality::Select('id', 'name')->get();
        $data['insurances'] = Insurances::Select('id', 'name')->get();
        return view('pages.home',$data);
    }

    public function admin()
    {
        $data['patients'] = DB::table('users')->where('user_level',1)->count();
        $data['doctors'] = DB::table('users')->where('user_level',2)->count();
        $data['appointments'] = DB::table('appointments')->where('doctor_cancelled',0)->where('patient_cancelled',0)->count();
        $data['comments'] = 0;
        return view('adminpages.dashboard',$data);
    }

    public function add_doctor()
    {
        $data['specialties'] = Speciality::Select('id', 'name')->get();
        return view('adminpages.add_doctor',$data);
    }

    public function all_doctor()
    {
        $data['doctors'] = DB::table('users')->where('user_level',2)->get();
        return view('adminpages.all_doctor',$data);
    }

    public function add_patient()
    {
        return view('adminpages.add_patient');
    }

    public function all_patient()
    {
        $data['patients'] = DB::table('users')->where('user_level',1)->get();
        return view('adminpages.all_patient',$data);
    }

    public function system_settings()
    {
        $data['system_info'] = get_system_info();
        return view('adminpages.system_settings',$data);
    }

    public function save_system_settings(Request $request){
        $name = $request->name;
        $email = $request->email;

        //Updating for name
        DB::table('system_settings')
            ->where('meta_key', 'name')
            ->update(['meta_value' => $name]);

        //Updating for email
        DB::table('system_settings')
            ->where('meta_key', 'email')
            ->update(['meta_value' => $email]);

        $message = "Settings Successfully Saved";
        Session::put('successful',$message );
        return redirect()->intended('/system-settings');
    }

    public function admin_settings(){
        return view('adminpages.admin_settings');
    }

    public function passwordChange(Request $request)
    {

        if ($request->isMethod('post')) {
            $currentUser = Auth::user();
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
                    return redirect()->route('admin_settings');
                } else {
                    Session::put('unsuccessful', 'Your Password and Confirm Password Didn\'t Match');
                    return redirect()->route('admin_settings');
                }
            }else{
                Session::put('unsuccessful', 'Your Current Password Didn\'t Match');
                return redirect()->route('admin_settings');
            }

        }
    }

    public function action(Request $request){
        $action = $request->action;
        $user_id = $request->user_id;
        $type = $request->type;
        //Updating user
        DB::table('users')
            ->where('id', $user_id)
            ->update(['active' => $action]);

        Session::put('successful', 'User Status Successfully Updated');
        if($type == 1){
            return redirect()->route('all_patient');
        }else if($type == 2){
            return redirect()->route('all_doctor');
        }
    }
}
