<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEditCoopPayInfoController extends Controller
{
    public function adminEditCoopPayInfo (){
        //viewの返すところは適当で良い
        return view('admin.AdminEditCoopPayInfo');
    }
}
