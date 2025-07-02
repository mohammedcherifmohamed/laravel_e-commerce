<?php

namespace App\Http\Controllers\Admin ;
use Illuminate\Http\Request;    
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {


    public function login(){
       
        return view("admin.auth.Login");
    }

    public function adminloginPost(Request $req){
        $req->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where('email',$req->email)->first();

        if($user){
            if(Hash::check($req->password , $user->password) && $user->role == 'admin'){
                Auth::login($user);
                return redirect()->route('index');
            }else{
                return back()->with('password_error',"Invalid Password")->withInput();
            }
        }else{
            return back()->with('user_error' , "User not found")->withInput() ;
        }


    }

    public function logout(){

        Auth::logout();
        return redirect()->route('login');
    }


    public function register(){
       
        return view("admin.auth.Registter");
    }



}