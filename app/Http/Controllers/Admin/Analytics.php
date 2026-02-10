<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;


class Analytics extends Controller
{
    public function get_analyze_sales(){
        // make get request to local host
        $response = Http::get('http://localhost:9000/');
        return $response->json();
    }
}
