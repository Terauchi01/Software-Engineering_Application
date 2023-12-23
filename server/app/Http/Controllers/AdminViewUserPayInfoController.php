<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserPayInfoController extends Controller
{
    public function adminViewUserPayInfo (){
        //viewの返すところは適当で良い
        return view('admin.AdminViewUserPayInfo');
    }
}
