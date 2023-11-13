<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDoctorRequest;
use App\Models\AddressModel;
use App\Models\DoctorModel;
use App\Models\hospitalModel;
use App\Models\ScheduleModel;
use App\Models\SpecialtyModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
     public function zindex(){
        $s=50;
        return view('doctor/admin',['id' => $s]);
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
    function checkSpecialty($s1)
    {
        $address = SpecialtyModel::where('name', $s1)

            ->first();

        // Kiểm tra xem kết quả của truy vấn có tồn tại hay không
        if ($address) {
            $address = SpecialtyModel::select('id')->where('name', $s1)->first();

            return $address;
        } else {


            return  false;
        }
    }
    function checkUser($s1, $s2, $s3)
    {
        $address = User::where('email', $s3)

            ->first();

        // Kiểm tra xem kết quả của truy vấn có tồn tại hay không
        if ($address) {
            $address = User::select('id')->where('email', $s3)->first();

            return $address;
        } else {
            $data = [
                'name' => $s1,
                'password' => $s2,
                'email' => $s3,
                'role' => '1',
            ];

            return  User::create($data);
        }
    }
    public function index()
    {
        $user = Auth::user();
        $doctor = DoctorModel::where('id_user', $user['id'])->first();
       
        $specialties = SpecialtyModel::find($doctor->id_specialty);

        $hospital = HospitalModel::find($specialties['id_hospital']);
        
        $specialty = SpecialtyModel::where('id_hospital', $hospital['id'])->get();

       
        $doctors = [];
        
        foreach ($specialty as $specialties) {
            $temptDoctors = DoctorModel::where('id_specialty', $specialties['id'])->get();
            $namespecialty=$specialties['name'];
            
            foreach ($temptDoctors as $doctor) {
               $address = AddressModel::where('id', $doctor['id'])->first();
                $doctor['address']=  $address['street_address'].' '.$address['commune'].' '.$address['district'].' '.$address['province'];
                $doctor['specialty'] = $namespecialty;
                $doctors[] = $doctor->toArray();
            }
        }
        
       
       



        return view('Doctor/DoctorAccount', ['doctors' => $doctors, 'specialty' => $specialty,  'user'=>$user]);
    }
    public function adddoctor(AddDoctorRequest $request)
    {

        $address = $request->only('province', 'district', 'commune', 'street_address');
        $user = $request->only('email', 'password', 'full_name');
        $user['name'] = $request->input('full_name');
        $doctor = $request->only('full_name', 'Qualifications');
        $specialty = $request->only('specialty');
        $id_address =   $this->checkAddress($address['province'], $address['district'], $address['commune'], $address['street_address'],);

        $doctor = $request->only('full_name', 'experience');
        $id_pecialty = $this->checkSpecialty($specialty['specialty']);
        //dd( $id_pecialty);
        $id_user = $this->checkUser($user['name'], $user['password'], $user['email']);
        DoctorModel::create([
            'id_address' => $id_address['id'],
            'id_user' => $id_user['id'],
            'id_specialty' => $id_pecialty['id'],
            'full_name' => $request->input('full_name'),
            'sex'=>$request->input('sex'),
            'Qualifications' => $request->input('experience'),
        ]);
        return back()->withInput();
    }
    public function delete($id)
    {
        $doctor = DoctorModel::find($id);
       // dd($doctor['id_user']);
        $user = User::find( $doctor['id_user']);
        if ($user) {
            $user->delete();
        }
        $doctor = DoctorModel::find($id);
        if ($doctor) {
            $doctor->delete();
        }
        $working = ScheduleModel::where('id_doctor',)->first();
        if ($working) {
            $working->delete();
        }
        
        return redirect()->back();
    }
}
