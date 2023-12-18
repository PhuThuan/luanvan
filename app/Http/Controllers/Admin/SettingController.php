<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SendMailModel;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mail= SendMailModel::find(1);
        return view('admin.setting',['mail'=>$mail]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
        $data = $request->validate([
            'mail_transport'  =>'required',
            'mail_host'       =>'required',
            'mail_port'       =>'required',
            'mail_username'   =>'required',
            'mail_password'   =>'required',
            'mail_encryption' =>'required',
            'mail_from'       =>'required',
        ]);
        $mailsetting=SendMailModel::where('id',1)->first();
      
        $mailsetting->update($data);
        //  dd(   $mailsetting->update($data));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $mailsetting=SendMailModel::where('id',2)->first()->toArray();
        $mailsetting1=SendMailModel::where('id',1)->first();
        $mailsetting1->update($mailsetting);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
