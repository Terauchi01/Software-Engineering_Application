<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminManagementUserInfoController extends Controller
{
    // 利用者管理
    public function adminViewUserList (){
        //viewの返すところは適当で良い
        return view('user.test');
    }

    public function adminEditUserInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
