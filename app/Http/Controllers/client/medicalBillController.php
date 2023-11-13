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

        $patients = patientRecordsModel::where('id_user', $user->id)->get();
        
        $phieukhambenh = null;
        
        foreach ($patients as $patient) {
            $appointment = appointmentScheduleModel::where('id_patient_records', $patient->id)
                ->where('id', $id)
                ->latest()
                ->first();
        
            if ($appointment) {
                $phieukhambenh = $appointment;
                break; // Dừng vòng lặp sau khi tìm thấy bản ghi phieukhambenh
            }
        }    
        
     
        return view('client.phieukham', ['phieukhambenh' => $phieukhambenh]);
        
    }
}
