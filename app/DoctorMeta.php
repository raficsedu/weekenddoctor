<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorMeta extends Model
{   
    public function user(){
    	return $this->belongsTo("App\User"); 
    }
    public $timestamps = false;
}
