<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserInfoController extends Controller
{
    public function adminViewUserInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
