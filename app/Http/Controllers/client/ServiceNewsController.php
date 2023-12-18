<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\newsModel;
use Illuminate\Http\Request;

class ServiceNewsController extends Controller
{
    //
    public function index(){
     $new=   newsModel::where('id_newsCategories',3)->get()->toarray();
   // dd( $new);
        return view('client.tintuc',['new'=>$new]);
    }
    public function service(){
        $new=   newsModel::where('id_newsCategories',4)->get()->toarray();
       
        return view('client.tintucservice',['new'=>$new]);
    }

    public function indexid($id){
        $new=   newsModel::find($id);
        return view('client.tintucid',['new'=>$new]);
    }
    public function serviceid($id){
        $new=   newsModel::find($id);
        return view('client.tintucserviceid',['new'=>$new]);
    }

    
}
