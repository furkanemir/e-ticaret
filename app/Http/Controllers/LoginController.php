<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('frontend.login');
    }
    public function loginPostFront(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('homepage');
        }
        return redirect()->route('login')->withErrors('Email adresi veya şifre hatalı');
    }
    public function logout(){
        if (Auth::check()){
            Auth::logout();
            return to_route('homepage');
        }else{
            return redirect()->route('homepage');
        }
    }
    public function register(){
        return view('frontend.register');
    }
    public function registerPostFront(Request $request){

        $request->validate(
            [
                'email'=>'unique:users,email|required|email',
                'password'=>'required|same:password_check',
            ],
            [
                'email.unique'=>'Bu email zaten kayıtlı.',
                'email.email'=>'Bu email adresi kabul edilemez.',
                'password.same'=>'Şifreler Uyuşmuyor.'
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role_id =2;
        $user->save();
        Auth::login($user, true);
        return redirect()->route('homepage');


    }

}
