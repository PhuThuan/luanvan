<?php

namespace App\Http\Controllers\Admindoctor;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\patientRecordsModel;
use App\Models\SpecialtyModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminstatisticalController extends Controller
{
    //
    public function statistical()
    {
        $userId = Auth::id();
        $doctor = DoctorModel::where('id_user', $userId)->first();
        $Specialty = SpecialtyModel::find($doctor->id_specialty);
        $hospital = hospitalModel::find($Specialty->id_hospital);

        $Specialty1 = SpecialtyModel::where('id_hospital', $hospital['id'])->get()->toArray();
        $validSpecialties = [];

        $doctorsList = [];
        $appointment = [];
        foreach ($Specialty1 as &$specialty) {
            $userId = $specialty['id'];
            $doctors = DoctorModel::where('id_specialty', $userId)->where('full_name', '<>', 'admin')->get()->toArray();

            foreach ($doctors as &$tempt) {

                $appointmentSchedule = appointmentScheduleModel::where('hospital', $hospital['name'])
                    ->where('specialty', $specialty['name'])
                    ->where('doctor', $tempt['full_name'])
                    ->get()
                    ->toArray();
                $appointment = array_merge($appointment, $appointmentSchedule);
                $tempt['app'] = count($appointmentSchedule);
            }

            if (!empty($doctors)) {
                $specialty['doctors'] = $doctors;
                $doctorsList = array_merge($doctorsList, $doctors);
                $validSpecialties[] = $specialty;
            }
        }


        $patiemts = [];
        foreach ($appointment as $appointments) {
            $patiemt = patientRecordsModel::where('id', $appointments['id_patient_records'])->get()->toArray();

            $patiemts = array_merge($patiemts, $patiemt);
        }
        foreach ($patiemts as &$record) {
            // Thêm các phần tử mới vào mỗi phần tử của mảng

            // Cập nhật thông tin địa chỉ
            $address = AddressModel::find($record['id_address']);
            $record['province'] = $address['province'];
            $record['district'] = $address['district'];
            $record['commune'] = $address['commune'];
            $record['street_address'] = $address['street_address'];
            $record['address'] = implode(', ', array_filter([$address['province'], $address['district'], $address['commune'], $address['street_address']]));
        }

        $provinceData  = AppointmentScheduleModel::where('hospital',$hospital['name'])->join('patientRecords', 'appointmentschedule.id_patient_records', '=', 'patientRecords.id')
        ->select('appointmentschedule.*', 'patientRecords.id_address') // Chọn các cột bạn muốn hiển thị từ cả hai bảng
        ->get()->toArray();
        
        $provinceCounts= [];
        
        foreach ($provinceData  as $appointment) {
            // Lấy tỉnh hoặc thành phố từ trường "dia_chi"
            $address = AddressModel::find($appointment['id_address']);
            $nameAddress = $address['street_address'] . ' ' . $address['commune'] . ' ' . $address['district'] . ' ' . $address['province'];
            // $province = $appointment->address;
            // $address = "765 Đ. Lê Hồng Phong Phường 12 Quận 10 Thành phố Hồ Chí Minh";
            // Sử dụng biểu thức chính quy để lấy phần sau từ "Tinh" hoặc "Thanh pho"
            if (preg_match('/(?:Thành phố|Tỉnh)\s*([\p{L}\s]+)/u', $nameAddress, $matches)) {
                $cityOrProvince = $matches[1];
                // dd($cityOrProvince);
            
                if (isset($provinceCounts[$cityOrProvince])) {
                    // Nếu đã có, tăng số lượng lên 1
                    $provinceCounts[$cityOrProvince] += 1;
                } else {
                    // Nếu chưa có, thêm mới với số lượng là 1
                    $provinceCounts[$cityOrProvince] = 0;
                }
            }
        }
        




       

        // Đảm bảo là mảng đã được thay đổi được cập nhật

    //   dd($provinceCounts);
        return view('admindoctor/tatistical', ['doctorsList' => $doctorsList,'provinceCounts'=>$provinceCounts]);
    }
}
