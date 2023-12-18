<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function A (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
