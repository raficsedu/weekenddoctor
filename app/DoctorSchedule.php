<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{   
    public function user(){
    	return $this->belongsTo("App\User"); 
    }
    public $timestamps = false;
}
