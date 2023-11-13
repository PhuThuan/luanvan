<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\cooperateModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function store(Request $request)
    {
        $data =    $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'sdt' => ['required', 'string'],
            'note' => ['required', 'string']
        ]);
        $data['status'] = 1;
     
        cooperateModel::create($data);
        return redirect()->back();
    }
}
