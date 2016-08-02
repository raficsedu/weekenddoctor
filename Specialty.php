<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialtiy extends Model
{   
	protected $table="specialties";
    
    public function user(){
    	return $this->belongsTo("App\User"); 
    }
}
