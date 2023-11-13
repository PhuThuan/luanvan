<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddressModel;
use App\Models\appointmentScheduleModel;
use App\Models\patientRecordsModel;
use Illuminate\Http\Request;

class AdminpatientInformationController extends Controller
{
    //
    public  function  index()
    {
        $patients = patientRecordsModel::orderBy('created_at', 'desc')->get();
        foreach ($patients as $id => $patient) {
            $patient['id'] = $id;
            $address =   AddressModel::find($patient['id_address']);
            $patient['province'] = $address['province'];
            $patient['district'] = $address['district'];
            $patient['commune'] = $address['commune'];
            $patient['street_address'] = $address['street_address'];
        }
        if (request()->wantsJson()) {
            return response()->json($patients);
        }

        $uniqueValue = appointmentScheduleModel::select('id_patient_records')
            ->distinct()
            ->get();

        return view('admin.AdminpatientInformation', ['patients' => $patients, 'uniqueValue' => $uniqueValue]);
    }
}
