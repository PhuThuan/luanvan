<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointmentScheduleModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
    
$users = User::whereDate('last_accessed', Carbon::today())->get();
$appointmentSchedule = appointmentScheduleModel::whereDate('day', Carbon::today())->get();
$hospital =hospitalModel::get();
$doctor=DoctorModel::get();
        return view('admin/admin',['users'=>count($users),'appointmentSchedule'=>count($appointmentSchedule),'hospital'=>count($hospital),'doctor'=>count($doctor)]);
    }

    public function workSchedule(){
  
        return view('doctor/workSchedule');
    }
    
}
