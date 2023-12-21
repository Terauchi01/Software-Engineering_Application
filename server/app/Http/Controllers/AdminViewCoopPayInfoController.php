<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopPayInfoController extends Controller
{
    public function adminViewCoopPayInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
