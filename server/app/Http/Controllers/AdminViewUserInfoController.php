<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserInfoController extends Controller
{
    public function adminViewUserInfo (){

        return view('admin.AdminViewUserInfo');
    }
}
