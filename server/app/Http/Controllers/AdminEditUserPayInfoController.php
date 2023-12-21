<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEditUserPayInfoController extends Controller
{
    public function adminEditUserPayInfo (){
        //viewの返すところは適当で良い
        return view('admin.AdminEditUserPayInfo');
    }
}
