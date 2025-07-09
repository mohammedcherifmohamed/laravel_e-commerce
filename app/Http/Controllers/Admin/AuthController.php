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
                return redirect()->route('admin.index');
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


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:3',
        ]);

        try {
            $user = \App\Models\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'admin', // Ensure this sets the user as admin
            ]);

            return redirect()->route('admin.login')->with('success', 'Admin registered successfully. Please login.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function showRegisterForm()
    {
        return view('admin.auth.Register');
    }


}