<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopPayInfoController extends Controller
{
    // 事業者支払い状態
    public function adminViewCoopPayInfo (){
        //viewの返すところは適当で良い
        return view('admin.AdminViewCoopPayInfo');
    }
}