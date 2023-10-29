<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\SpecialtyModel;
use App\Models\User;
use Illuminate\Http\Request;

class hospitalController extends Controller
{
    public function index()
    {
        $hospitals = hospitalModel::get();

        foreach ($hospitals as $hospital) {
            $address = AddressModel::where('id', $hospital['id_address'])->first();
        
            // Tạo một chuỗi mới chứa thông tin địa chỉ
            $newAddress = $address['province'].' '.$address['district'].' '.$address['commune'].' '.$address['street_address'];
        
            // Gán chuỗi mới vào trường id_address của bệnh viện
            $hospital['id_address'] = $newAddress;
        }
        return view('admin.hospital', ['hospitals' => $hospitals]);
    }
    function checkAddress($s1, $s2, $s3, $s4)
    {
        $address = AddressModel::where('province', $s1)
            ->where('district', $s2)
            ->where('commune', $s3)
            ->where('street_address', $s4)
            ->first();

        // Kiểm tra xem kết quả của truy vấn có tồn tại hay không
        if ($address) {
            $address = AddressModel::select('id')->where('province', $s1)
                ->where('district', $s2)
                ->where('commune', $s3)
                ->where('street_address', $s4)->first();

            return $address;
        } else {
            $data = [
                'province' => $s1,
                'district' => $s2,
                'commune' => $s3,
                'street_address' => $s4,
            ];

            return  AddressModel::create($data);
        }
    }
    public function store(Request $request)
    {
     
        $address = $request->only('province', 'district', 'commune', 'street_address');
        $id_address =   $this->checkAddress($address['province'], $address['district'], $address['commune'], $address['street_address'],);
     
        $user= User::create([
            'email'=>$request->input('user'),
            'password'=>$request->input('password'),
            'name'=>'Admin',
            'role'=>'1',
        ]);
        
       $dd= hospitalModel::create([
            'id_address'=>$id_address['id'],
            'name'=>$request->input('name'),
            'hospital_type'=>'Phòng Khám',
            'status'=>0,
            'slug'=>$request->input('slug')
        ]);
        $specialty=SpecialtyModel::create([
            'id_hospital'=>$dd['id'],
            'name'=>$request->input('specialty'),
            'slug'=>$request->input('specialty_slug')
        ]);
        $doctor=DoctorModel::create([
            'id_address'=>$id_address['id'],
            'id_user'=>$user['id'],
            'id_specialty'=>$specialty['id'],
            'full_name'=>'admin',
            'sex'=>'nam',
            'Qualifications'=>'0',
        ]);
       return redirect()->back();
    }
    public function delete($id){
        $hospital = hospitalModel::find($id);
        if ($hospital) {
            $hospital->delete();
        }
        return redirect()->back();
    }


}
