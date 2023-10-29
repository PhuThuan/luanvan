<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientRecordsModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\WorkkingtimeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class medicalBillController extends Controller
{
    //
    public function index($id)
    {
        $user = Auth::user();

        $patients = patientRecordsModel::where('id_user', $user['id'])->get();

        $tempt = [];

        foreach ($patients as $patient) {

            $appointments = appointmentScheduleModel::where('id_patient_records', $patient['id'])->where('id', $id)->get();
            $tempt = array_merge($tempt, $appointments->toArray());
        }
        if ($tempt == null) {
            return to_route('error');
        }
       foreach ($tempt as $tempts){
        $a=$tempts['id'];
        $pr =   patientRecordsModel::where('id_user', $user['id'])->where('id', $tempts['id_patient_records'])->first();
        $sch =    ScheduleModel::where('id', $tempts['id_work_schedule'])->first();
       }
      
       $doctor=DoctorModel::find($sch['id_doctor']);

     $Specialty=  SpecialtyModel::find($doctor['id_specialty']);
     
     $hospital=hospitalModel::find($Specialty['id_hospital']);
     $address=AddressModel::find($pr['id_address']);
   
     $nameAddress= $address['province'].' '. $address['district'].' '. $address['commune'];
       $time=WorkkingtimeModel::find( $sch['id_working_time']);
       $phieukhambenh = [
        'id'=>$a,
        'name' => $pr['name'],
        'age' => $pr['date_of_birth'],
        'gender' => $pr['gender'],
        'doctor' =>  $doctor['full_name'],
        'specialty'=> $Specialty['name'],
        'hospital' =>  $hospital['name'],
        'address'=> $nameAddress,
        'time'=>$time['start_time'].' -> '.$time['end_time'],
        'day'=>$time['day'],
    ];
      //  dd($pr,  $sch, $phieukhambenh);
        return view('client.phieukham', ['phieukhambenh'=>$phieukhambenh]);
    }
}
