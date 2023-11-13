<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\hospitalModel;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    //
    public function index()
    {
        $hospitals = hospitalModel::where('status',1)->get();

        foreach ($hospitals as $hospital) {
            $address = AddressModel::where('id', $hospital['id_address'])->first();
        
            // Tạo một chuỗi mới chứa thông tin địa chỉ
            $newAddress = $address['province'].' '.$address['district'].' '.$address['commune'].' '.$address['street_address'];
        
            // Gán chuỗi mới vào trường id_address của bệnh viện
            $hospital['id_address'] = $newAddress;
        }
        if (request()->wantsJson()) {
            return response()->json($hospitals);
        }
       
        return view('client/schedule', ['hospitals' => $hospitals]);
    }
}
