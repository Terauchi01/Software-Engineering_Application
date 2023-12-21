<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    public function adminLogout (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
