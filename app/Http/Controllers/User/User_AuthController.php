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

}
