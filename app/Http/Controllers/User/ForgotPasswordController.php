<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Models\User ;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm(){
        return view('user.Auth.ForgetPassword');
    }

    public function sendVerifucationCode(Request $req){
        // check if the email exists in database 
        $email = $req->email ;
        $user = new User();
        $result = $user->where('email',$email)->first();
        // dd($result);
        if(!$result){
            return redirect()->back()->with('error',"Email Does Not Exist");
        }else{
            // send verification code to the email
            $verification_code = rand(100000, 999999); 
            $result->remember_token = $verification_code;
            $result->save();
            Mail::to($req->email)
            ->send((new \App\Mail\SendEmail( $verification_code))->with(['verification_code' => $verification_code]));

            return view('user.Auth.Token');
        }

    }

     public function checkToken(Request $req){
        

    }
 }
