<?php

namespace App\Http\Controllers;



use App\Models\patientRecordsModel;
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

        return view('home',['patientrecords'=>$patientRecords]);
    }
}
