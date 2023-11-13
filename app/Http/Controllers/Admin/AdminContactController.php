<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cooperateModel;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    //
    public function index(){
        $cooperateData = CooperateModel::orderBy('created_at', 'desc')->get();

        return view('Admin.AdminContact',['cooperateData'=>$cooperateData]);
    }

    public function update($id){
        CooperateModel::find($id)->update(['status' => 1]);
       

        return redirect()->back();
    }
    public function delete($id){
        CooperateModel::find($id)->delete();
       

        return redirect()->back();
    }
    
    
}
