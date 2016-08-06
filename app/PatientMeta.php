<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMeta extends Model
{   
    public function user(){
    	return $this->belongsTo("App\User"); 
    }
    public $timestamps = false;
}
