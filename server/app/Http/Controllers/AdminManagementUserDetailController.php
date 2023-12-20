<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminManagementUserDetailController extends Controller
{
    // 利用者情報詳細
    public function adminViewUserInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
