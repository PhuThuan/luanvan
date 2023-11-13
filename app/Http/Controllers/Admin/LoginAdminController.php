<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAdminRequest;

use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    //
    public function index()
    {
        return  view('admin/loginAdmin');
    }
    public function loginAdmin(LoginAdminRequest $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user =  auth::user();
            if ($user->role == 3) {
                return to_route('adminSys');
            }
            if ($user->role == 2) {
                return to_route('admindoctor');
            }
            if ($user->role == 1) {
                return to_route('Admin');
            }

            // Redirect to a dashboard or any other route
        }

        // Authentication failed
        return back()->withErrors(['message' => 'Invalid credentials']);
    }
}
