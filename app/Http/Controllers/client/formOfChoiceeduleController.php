<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientRecordsModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\WorkkingtimeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class formOfChoiceeduleController extends Controller
{
  //

  public function index($slug)
  {
    return view('client/formOfChoiceedule', ['slug' => $slug]);
  }
  public function indexdoctor($slug)
  {
    $hospital = HospitalModel::where('slug', $slug)->first();

    // Retrieve the specialties associated with the hospital
    $specialties = SpecialtyModel::where('id_hospital', $hospital->id)->get();

    $doctors = []; // Create an array to collect doctors

    foreach ($specialties as $special) {
      $specialtyDoctors = DoctorModel::where('id_specialty', $special->id)->get();
      $specialtyName = $special->name;

      foreach ($specialtyDoctors as $doctor) {
        $doctor['specialty'] = $specialtyName;
        $doctors[] = $doctor->toArray();
      }
    }

    // Retrieve the doctors associated with the hospital
    return view('client/formOfChoiceedulebydoctor', ['slug' => $slug, 'hospital' => $hospital, 'doctors' => $doctors]);
  }

  public function bookingdoctor($slug, $booking)
  {


    $scheduleItems = ScheduleModel::where('id_doctor', $booking)
    ->where('status', 0)
    ->get();
$today = Carbon::now('Asia/Ho_Chi_Minh');

$workSchedules = [];

foreach ($scheduleItems as $scheduleItem) {
    $workingTime = WorkkingtimeModel::where('id', $scheduleItem->id_working_time)
        ->first();

    if ($workingTime) {
        $workingDate = Carbon::parse($workingTime->day, 'Asia/Ho_Chi_Minh');

        if ($today->lessThanOrEqualTo($workingDate)) {
            $workSchedule = [
                'id' => $scheduleItem->id,
                'start_time' => $workingTime->start_time,
                'end_time' => $workingTime->end_time,
                'day' => $workingTime->day,
                'schedules' => $scheduleItem->status,
            ];

            $workSchedules[] = $workSchedule;
        }
    }
}




    return view('client/m', ['workSchedules' => $workSchedules, 'slug' => $slug, 'booking' => $booking]);
  }

  public function bookingdoctorid($slug, $booking, $idchs)
  {

    $id_user=Auth::id();
 
    $patientRecords = patientRecordsModel::where('id_user', $id_user)->get();
  
    return view('client.k',['patientRecords'=>$patientRecords,'slug'=>$slug,'booking'=> $booking,'idchs'=> $idchs]);
  }
  public function bookingdoctoridrc($slug, $booking, $idchs,$idrc){

    $hospital=hospitalModel::where('slug',$slug)->first();
   $Schedule= ScheduleModel::where('id',$idchs)->first();

   $Workkingtime=WorkkingtimeModel::where('id', $Schedule['id_working_time'])->first();
   $doctor=DoctorModel::where('id', $Schedule['id_doctor'])->first();
   $Specialty=SpecialtyModel::where('id', $doctor['id_specialty'])->first();
   $patientRecords=patientRecordsModel::where('id',$idrc)->first();
   $address=AddressModel::where('id',$patientRecords['id_address'])->first();


    return view('client.done',['hospital'=> $hospital,'Workkingtime'=>  $Workkingtime,'doctor'=> $doctor,'patientRecords'=>$patientRecords,'Specialty'=>$Specialty,'address'=>$address,'Schedule'=>$Schedule]);
  }



}
