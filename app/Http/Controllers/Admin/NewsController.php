<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\newcategoriesModel;
use App\Models\newsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //
    public function index()
    {
        $questionCategories = newCategoriesmodel::get();

        $questions = [];
         $questions =   newsModel::get();



        return view('admin.News', ['questionCategories' => $questionCategories, 'questions' => $questions,]);
    }
    public function newsCategories(Request $request)
    {
        $user = Auth::id();

        $request->validate(['new_name' => 'string|required']);
        newcategoriesModel::create([
            'id_user' => $user,
            'name' =>  $request->input('new_name'),
        ]);

        return redirect()->back();
    }
    public function deletenewCategories($id)
    {

        $questioncategoriesModel = newcategoriesModel::find($id);
        if ($questioncategoriesModel) {
            $questioncategoriesModel->delete();
        }
        return redirect()->back();
    }

    public function storenews(Request $request)
    {
        // Kiểm tra và xử lý dữ liệu từ biểu mẫu
        $data = $request->validate([
            'id_newsCategories' => 'required',
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image',
            'published_at' => 'required|date',
            'author' => 'required',
            'category' => 'required',
        ]);

        // Xử lý tệp hình ảnh
        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $imagePath = 'image/news/' . $uploadedFile->getClientOriginalName(); // Define the file path and name
        
            // Move the uploaded file to the desired location
            $uploadedFile->move(public_path('image/news'), $imagePath);
        
            // Now, $imagePath contains the relative path to the uploaded file
            $data['image_url'] = $imagePath;
        }

        // Lưu tin tức vào cơ sở dữ liệu
      
        newsModel::create($data);
      
        return redirect()->back();
    }
    public function deletenew($id)
    {
        $id =  newsModel::find($id);
        if ($id) {
            $id->delete();
        }
        return redirect()->back();
    }
    public function details($id)
    {
        $new =  newsModel::find($id);
        htmlspecialchars($new['content']);

        return view('admin.newsdetails', ['new' => $new, ]);
    }
    
}
