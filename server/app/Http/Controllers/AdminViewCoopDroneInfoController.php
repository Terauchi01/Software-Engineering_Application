<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopDroneInfoController extends Controller
{
    public function adminViewCoopDroneInfo (){
        //viewの返すところは適当で良い
        return view('admin.AdminViewCoopDroneInfo');
    }
}
