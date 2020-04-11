<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function getDanhsach()
    {
    	$nhanvien = Employee::all();
    	return view('admin.slide.danhsach',['nhanvien'=>$nhanvien]);
    }

}
