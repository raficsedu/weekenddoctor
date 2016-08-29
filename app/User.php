<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The function rules to validate data
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
    ];

    /**
     * The function rules to validate data
     *
     * @var array
     */
    public static $rulesForgot = [
        'email' => 'required|email|max:255'
    ];

    //Get Patient Metas
    public function patient_metas(){
        return $this->hasMany('App\PatientMeta');
    }

    //Get Doctor Metas
    public function doctor_metas(){
        return $this->hasMany('App\DoctorMeta');
    }
	
	//Get Doctor Schedules
    public function doctor_schedules(){
        return $this->hasMany('App\DoctorSchedule');
    }
}
