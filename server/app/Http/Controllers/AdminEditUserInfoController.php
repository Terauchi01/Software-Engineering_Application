<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEditUserInfoController extends Controller
{
    public function adminEditUserInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
