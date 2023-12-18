<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\patientrecordsResquest;
use App\Models\AddressModel;
use App\Models\patientRecordsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatientRecordController extends Controller
{


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
    //

    public function create()
    {


        return view('client/patientrecords');
    }
    public function update($id)
    {

        $patientRecords = [];

        if ($id != null) {
            $patientRecord = patientRecordsModel::find($id);

            if ($patientRecord) {
                $address = AddressModel::find($patientRecord['id_address']);

                $patientRecords = [
                    "id" => $patientRecord['id'],
                    "name" => $patientRecord['name'],
                    "date_of_birth" => $patientRecord['date_of_birth'],
                    "phone" => $patientRecord['phone'],
                    "gender" => $patientRecord['gender'],
                    "job" => $patientRecord['job'],
                    "CCCD" => $patientRecord['CCCD'],
                    "email" => $patientRecord['email'],
                    "ethnic" => $patientRecord['ethnic'],
                    'province' => $address['province'],
                    'district' => $address['district'],
                    'commune' => $address['commune'],
                    'street_address' => $address['street_address'],
                ];
            }
        }


        return view('client/patientrecords', ['patientRecords' => $patientRecords]);
    }
    public function stores(patientrecordsResquest $request)
    {
        $address = $request->only('province', 'district', 'ward', 'street_address');

        $id_address =   $this->checkAddress($address['province'], $address['district'], $address['ward'], $address['street_address'],);
        $a = patientRecordsModel::create(
            [
                'id_user' => Auth::id(),
                'id_address' => $id_address['id'],
                'name' => $request->input('full_name'),
                'date_of_birth' => $request->input('dob'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender'),
                'job' => $request->input('occupation'),
                'CCCD' => $request->input('id_number'),
                'email' => $request->input('email'),
                'ethnic' => $request->input('ethnicity'),
                'status' => 1,
            ],
        );
        return redirect()->back();
    }
    public function updateid($id, patientrecordsResquest $request)
    {
        $patientRecords = [];

        $patientRecord = patientRecordsModel::find($id);

        $address = $request->only('province', 'district', 'ward', 'street_address');

        $id_address =   $this->checkAddress($address['province'], $address['district'], $address['ward'], $address['street_address'],);


        $tempt = [
            "name" => $request->input('full_name'),
            "date_of_birth" => $request->input('dob'),
            "phone" => $request->input('phone'),
            "gender" => $request->input('gender'),
            "job" => $request->input('occupation'),
            "CCCD" => $request->input('id_number'),
            "email" => $request->input('email'),
            "ethnic" => $request->input('ethnicity'),
            'id_address' => $id_address['id'],

        ];
        $patientRecord->update($tempt);
        return redirect()->back();
    }
    public function delete($id){
        $patientRecord = patientRecordsModel::find($id);
        if ($patientRecord){


            $patientRecord->update('status',0);
            // $patientRecord->delete();
        }
        return redirect()->back();
    }
    
}
