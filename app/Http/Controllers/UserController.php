<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function ip_details(  )
    {
        // $ip = '127.0.0.1'; //For static IP address get
        $ip = request()->ip();
        // dd($ip);
        $data = \Location::get($ip);
        // return view('details',compact('data'));
    }
}
