<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\cooperateModel;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    //
    public function index()
    {
        $cooperateData = CooperateModel::orderBy('created_at', 'desc')->get();

        return view('Admin.AdminContact', ['cooperateData' => $cooperateData]);
    }

    public function update($id)
    {
        CooperateModel::find($id)->update(['status' => 1]);


        return redirect()->back();
    }
    public function delete($id)
    {
        CooperateModel::find($id)->delete();


        return redirect()->back();
    }
    public function appointment()
    {

        $appointments = appointmentScheduleModel::with('patientRecord')->paginate(10);
        $appointments1 = appointmentScheduleModel::with('patientRecord')->get()->toArray();
        foreach ($appointments1 as &$item) {
            // Kiểm tra xem 'patient_record' có tồn tại trong $item không
            if (isset($item['patient_record'])) {
                // Kiểm tra xem 'id_address' có tồn tại trong 'patient_record' không
                if (isset($item['patient_record']['id_address'])) {
                    $address = AddressModel::where('id', $item['patient_record']['id_address'])->first();
                    if ($address) {
                        $nameAddress = $address['street_address'] . ' ' . $address['commune'] . ' ' . $address['district'] . ' ' . $address['province'];
                        $item['address'] = $nameAddress;
                    } else {
                        // Xử lý trường hợp không tìm thấy địa chỉ
                        $item['address'] = 'Không tìm thấy địa chỉ';
                    }
                } else {
                    // Xử lý trường hợp 'id_address' không tồn tại trong 'patient_record'
                    $item['address'] = 'Không có thông tin địa chỉ';
                }
            } else {
                // Xử lý trường hợp 'patient_record' không tồn tại trong $item
                $item['address'] = 'Không có thông tin địa chỉ';
            }
        }
        
        // In ra mảng sau vòng lặp
        // dd($appointments1);
        
        if (request()->wantsJson()) {

            return response()->json($appointments1);
        }
        return view('Admin.appointment', ['appointments' => $appointments]);
    }
}
