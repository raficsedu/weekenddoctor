<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurances extends Model
{   
	protected $table="insurances";
    public function user(){
        return $this->belongsTo("App\User"); 
    }
    public $timestamps = false;
}
