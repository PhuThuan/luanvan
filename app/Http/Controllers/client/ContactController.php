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
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'sdt' => ['required', 'string'],
            'note' => ['required', 'string']
        ]);
      cooperateModel::create($request->all());
      return redirect()->back();
    }
}
