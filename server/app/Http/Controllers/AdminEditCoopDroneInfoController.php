<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEditCoopDroneInfoController extends Controller
{
    public function adminEditCoopDroneInfo (){
        //viewの返すところは適当で良い
        return view('admin.AdminEditCoopDroneInfo');
    }
}
