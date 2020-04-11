<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";

    public function bill()
    {
    	return $this->hasMany('App\Bill', 'id_employee', 'id');
    }
}
