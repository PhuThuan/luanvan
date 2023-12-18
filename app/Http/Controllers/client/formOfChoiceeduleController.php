<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\CostModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientRecordsModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\User;
use App\Models\WorkkingtimeModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class formOfChoiceeduleController extends Controller
{
  //

  public function index($slug)
  {
    $hospital = HospitalModel::where('slug', $slug)->first();

    return view('client/formOfChoiceedule', ['slug' => $slug, 'hospital' => $hospital]);
  }
  public function indexdoctor($slug)
  {
    $hospital = HospitalModel::where('slug', $slug)->first();
    $address =  AddressModel::find($hospital->id_address);
    $addresshospital = $address['province'] . ' ' . $address['district'] . ' ' . $address['commune'] . ' ' . $address['street_address'];
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
    foreach ($doctors as $key => $doctor) {
      $user = User::where('id', $doctor['id_user'])->where('role', 2)->first();


      if ($user != null) {
        unset($doctors[$key]);
      }
    }



    // Retrieve the doctors associated with the hospital
    return view('client/formOfChoiceedulebydoctor', ['slug' => $slug, 'hospital' => $hospital, 'doctors' => $doctors, 'address' => $addresshospital]);
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

    $hospital = HospitalModel::where('slug', $slug)->first();
    $address =  AddressModel::find($hospital->id_address);
    $addresshospital = $address['province'] . ' ' . $address['district'] . ' ' . $address['commune'] . ' ' . $address['street_address'];
    $doctors = DoctorModel::find($booking);
    $speacialty = SpecialtyModel::find($doctors->id_specialty);
    return view('client/m', ['workSchedules' => $workSchedules, 'slug' => $slug, 'doctors' => $doctors, 'booking' => $booking, 'hospital' => $hospital, 'address' => $addresshospital, 'speacialty' => $speacialty]);
  }

  public function bookingdoctorid($slug, $booking, $idchs)
  {

    $id_user = Auth::id();

    $patientRecords = patientRecordsModel::where('id_user', $id_user)->where('status', 1)->get();

    return view('client.k', ['patientRecords' => $patientRecords, 'slug' => $slug, 'booking' => $booking, 'idchs' => $idchs]);
  }
  public function bookingdoctoridrc($slug, $booking, $idchs, $idrc)
  {


    $hospital = hospitalModel::where('slug', $slug)->first();
    $Schedule = ScheduleModel::where('id', $idchs)->first();

    $Workkingtime = WorkkingtimeModel::where('id', $Schedule['id_working_time'])->first();
    $doctor = DoctorModel::where('id', $Schedule['id_doctor'])->first();
    $Specialty = SpecialtyModel::where('id', $doctor['id_specialty'])->first();
    $patientRecords = patientRecordsModel::where('id', $idrc)->first();
    $address = AddressModel::where('id', $patientRecords['id_address'])->first();
    $cost = CostModel::where('id_hospital', $hospital->id)->first();
    $app = appointmentScheduleModel::where('id_patient_records', $idrc)->where('id_ws', $idchs)->first();

    if ($app) {
      return to_route('formOfChoiceedule',['slug'=>$slug]);
    }
    return view('client.done', ['hospital' => $hospital, 'Workkingtime' =>  $Workkingtime, 'doctor' => $doctor, 'patientRecords' => $patientRecords, 'Specialty' => $Specialty, 'address' => $address, 'Schedule' => $Schedule, 'cost' => $cost]);
  
  }
  public function chuyenkhoa($slug)
  {
    $hospital = HospitalModel::where('slug', $slug)->first();
    $address =  AddressModel::find($hospital->id_address);
    $addresshospital = $address['province'] . ' ' . $address['district'] . ' ' . $address['commune'] . ' ' . $address['street_address'];
    // Retrieve the specialties associated with the hospital
    $specialties = SpecialtyModel::where('id_hospital', $hospital->id)->get();






    // Retrieve the doctors associated with the hospital
    return view('client/chuyenkhoa', ['slug' => $slug, 'hospital' => $hospital, 'doctors' => $specialties, 'address' => $addresshospital]);
  }
  public function chuyenkhoa1($slug, $khoa)
  {
    $hospital = HospitalModel::where('slug', $slug)->first();
    $address =  AddressModel::find($hospital->id_address);
    $addresshospital = $address['province'] . ' ' . $address['district'] . ' ' . $address['commune'] . ' ' . $address['street_address'];
    // Retrieve the specialties associated with the hospital
    $specialties = SpecialtyModel::find($khoa);

    $specialtyDoctors = DoctorModel::where('id_specialty', $khoa)->get();

    foreach ($specialtyDoctors as $key => $doctor) {
      $user = User::where('id', $doctor['id_user'])->where('role', 2)->first();

      if ($user != null) {
        unset($specialtyDoctors[$key]);
      }
    }


    // Retrieve the doctors associated with the hospital
    return view('client/chuyenkhoa1', ['slug' => $slug, 'hospital' => $hospital, 'doctors' => $specialtyDoctors, 'address' => $addresshospital, 'specialties' => $specialties]);
  }
}
