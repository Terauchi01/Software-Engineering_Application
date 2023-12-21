<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserWithdrawController extends Controller
{
    public function userWithdraw (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
