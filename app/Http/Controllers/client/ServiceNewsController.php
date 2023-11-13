<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceNewsController extends Controller
{
    //
    public function index(){
        return view('client.servicenews');
    }
    public function service(){
        return view('client.client.service');
    }

    public function indexid(){
        return view('client.servicenews');
    }
    public function serviceid(){
        return view('client.servicenews');
    }

    
}
