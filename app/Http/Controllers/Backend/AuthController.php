<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function loginPost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->role_id == 1) {

                return redirect()->route('admin.dashboard');
            }
        }
        return redirect()->route('admin.login')->withErrors('Email adresi veya şifre hatalı');
    }
    public function logout(){

        Auth::logout();
        return to_route('admin.login');
    }
}
