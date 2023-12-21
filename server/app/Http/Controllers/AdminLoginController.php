<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminLogin (){
        //viewの返すところは適当で良い
        return view('admin.AdminLogin');
    }
}
