<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\questioncategoriesModel;
use App\Models\questionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller
{
    //
    public function index()
    {
        $questionCategories = questionCategoriesmodel::get();

        $questions = [];
        $questions =   questionModel::get();


        return view('Admin.Questions', ['questionCategories' => $questionCategories, 'questions' => $questions,]);
    }
    public function storequestionCategories(Request $request)
    {
        $user = Auth::id();

        $request->validate(['category_name' => 'string|required']);
        questioncategoriesModel::create([
            'id_user' => $user,
            'name' =>  $request->input('category_name'),
        ]);
        return redirect()->back();
    }
    public function deletequestionCategories($id)
    {

        $questioncategoriesModel =  questioncategoriesModel::find($id);
        if ($questioncategoriesModel) {
            $questioncategoriesModel->delete();
        }
        return redirect()->back();
    }
    public function storequestion(Request $request)
    {  // dd($request);
        $request->validate(['questionCategory' => 'required', 'name' => 'string|required', 'answer' => 'string|required']);
        $user = Auth::id();

        questionModel::create([
            'id_user' => $user,
            'id_questionCategories' => $request->input('questionCategory'),
            'name' => nl2br($request->input('name')),
            'Answer' => $request->input('answer'),

        ]);
        return redirect()->back();
    }
    public function deletequestion($id)
    {
        $id =  questionModel::find($id);
        if ($id) {
            $id->delete();
        }
        return redirect()->back();
    }
}
