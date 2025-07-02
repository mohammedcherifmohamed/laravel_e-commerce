<?php

namespace App\Http\Controllers\User ;
use Illuminate\Http\Request;    
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class User_AuthController extends Controller {

    public function home(){

        return view('user.Home');
    }
    public function shop(){

        return view('user.Shop');
    }
    
    public function Login_Register(Request $req ){

        return view('user.Auth.Login');
    }
    
    public function registerPost(Request $req ){
        
        $req->validate([
            "username" => "required|string|max:255|min:3",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:3|max:255|confirmed",
        ]);

        $result = User::create([
            "name" => $req->username,
            "email" => $req->email,
            "password" => Hash::make($req->password),
        ]);

     if($result){
        return redirect()->route('Login_Register')->with('success', 'Registration successful, please login.');
     }
        return redirect()->back()->with('error', 'Registration failed, please try again.');

    }

    public function loginPost(){

        $credentials = request()->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', 'Login successful, welcome back!');
        }

        return redirect()->back()->with('error', 'Invalid credentials, please try again.');

    }


    public function logout(){

        Auth::logout();
        return redirect()->route('home');

    }


}