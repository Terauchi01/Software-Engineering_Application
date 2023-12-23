<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserEditInfoController extends Controller
{
    public function userEditInfo (){
        //viewの返すところは適当で良い
        return view('user.UserEditInfo');
    }
}
