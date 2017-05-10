<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function students(){
    	return $this->hasMany('App\Student');
    }
}
