<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\questioncategoriesModel;
use App\Models\questionModel;
use Illuminate\Http\Request;

class instructController extends Controller
{
    //
    public function index(){
        return view('client.instruct');
    }

    public function refund(){
        return view('client.refund');
    }
    public function  frequently(){
        $questionCategories = questioncategoriesModel::get();

        $questions = [];
        $questions =   questionModel::get();


        return view('client.frequently', ['questionCategories' => $questionCategories, 'questions' => $questions,]);
       
    }
   

}
