<?php

namespace App\Http\Controllers;



use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientRecordsModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\WorkkingtimeModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (isset(Auth::user()->role)) {
            if (Auth::user()->role != 0) {

                return   to_route('error');
            }
        }


        $id_user = Auth()->id();
        $patientRecords = PatientRecordsModel::where('id_user', $id_user)
            ->where('status', 1)
            ->get();
        foreach ($patientRecords as   $patient) {
            $address = AddressModel::find($patient['id_address']);
            $patient['address'] = $address['province'] . ' ' . $address['district'] . ' ' . $address['commune'] . ' ' . $address['street_address'];
        }

        $user = Auth::user();

        $patients = patientRecordsModel::where('id_user', $user['id'])->where('status',1)->get();

        $tempt = [];
        $phieukhambenhList = [];
        foreach ($patients as $patient) {

            $appointments = appointmentScheduleModel::where('id_patient_records', $patient['id'])->orderBy('created_at', 'DESC')->get();
            $tempt = array_merge($tempt, $appointments->toArray());
        }
        $phieukhambenhList = $tempt;

     
        $Notification = [];
        $today = Carbon::now('Asia/Ho_Chi_Minh');
        
        foreach ($phieukhambenhList as $phieukhambenh) {
            $appointmentDate = Carbon::parse($phieukhambenh['day']);
     
            if ($appointmentDate->greaterThan($today)) {
                $Notification[] = $phieukhambenh; 

            }
        }
        
            //  dd($patientRecords);

        return view('home', ['patientrecords' => $patientRecords, 'phieukhambenh' =>  $phieukhambenhList, 'Notification' => count($Notification)]);
    }
}
