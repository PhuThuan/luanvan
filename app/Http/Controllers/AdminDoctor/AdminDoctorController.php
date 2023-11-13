<?php

namespace App\Http\Controllers\AdminDoctor;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\CostModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDoctorController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);

        $specialty = SpecialtyModel::where('id_hospital', $hospital['id'])->get();


        $doctors = [];

        foreach ($specialty as $specialties) {
            $tempDoctors = DoctorModel::where('id_specialty', $specialties['id'])->get();
            $namespecialty = $specialties['name'];

            foreach ($tempDoctors as $doctor) {
                $doctor['specialty'] = $namespecialty;
                $doctors[] = $doctor->toArray();
            }
        }

        $temptSchedule = [];
        foreach ($doctors as $doctor) {
            $tempSchedule = ScheduleModel::where('id_doctor', $doctor['id'])->where('status', 1)->get();
            if ($tempSchedule->isEmpty()) {
                continue; // Bỏ qua bác sĩ nếu không có lịch trình
            }
            $temptSchedule[] = $tempSchedule;
        }


        return view('admindoctor.index', ['doctor' => count($doctors)]);
    }

    public function infomation()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();

        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = hospitalModel::find($specialties['id_hospital']);
      
      $address=AddressModel::find( $hospital['id_address']);
      $hospital['address']=  $address['street_address'].' '.$address['commune'].' '.$address['district'].' '.$address['province'];

   $cost=   CostModel::find($hospital['id']);
        return  view('admindoctor.infomation',['hospital'=>$hospital,'cost'=>$cost]);
    }
}
