<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $s=50;
        return view('admin/admin',['id' => $s]);
    }

    public function workSchedule(){
  
        return view('doctor/workSchedule');
    }
    
}
