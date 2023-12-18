<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointmentScheduleModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientRecordsModel;
use App\Models\PermissionModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {

        $users = User::whereDate('last_accessed', Carbon::today())->get();
        $appointmentSchedule = appointmentScheduleModel::whereDate('day', Carbon::today())->get();
        $hospital = hospitalModel::get();
        $doctor = DoctorModel::get();
        return view('admin/admin', ['users' => count($users), 'appointmentSchedule' => count($appointmentSchedule), 'hospital' => count($hospital), 'doctor' => count($doctor)]);
    }

    public function user()
    {
        $users = User::paginate(10);
       
        return view('admin/userAdmin',['users'=>$users]);
    }


    public function getUserService($user_id)
    {
        $user = User::find($user_id);
        $group = PermissionModel::all();
           $role=   ['Người dùng'=>0,'Bác sĩ'=>1,'Quản lý bệnh viện'=>2,'ADMIN'=>3];
        $dataResult = [
            'name'=> $user['name'],
            'user_id' => $user['id'],
            'group' => $group,
            'currentRole' => $user['role'],
            'role' =>  $role,
            'currentGroup' => $user['gr_id'],
        ];
        $patients = patientRecordsModel::with('address')
        ->where('id_user', $user_id)
        ->orderBy('created_at', 'desc')
        ->get();
    
    // Bây giờ bạn có thể truy cập địa chỉ thông qua thuộc tính "address" của mỗi bản ghi
    foreach ($patients as $patient) {
        $patient['fullAddress'] = $patient->getFullAddressAttribute();
        $app =   appointmentScheduleModel::where('id_patient_records',$patient['id'])->get();
        $patient['app'] = count($app);
     
    }
         
      
            return view('admin/userDetailAdmin',['dataResult'=> $dataResult,'patients'=> $patients]);
    }
}
