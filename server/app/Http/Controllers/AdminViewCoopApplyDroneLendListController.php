<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopApplyDroneLendListController extends Controller
{
    public function adminViewCoopApplyDroneLendList (){
        //viewの返すところは適当で良い
        return view('admin.AdminViewCoopApplyDroneLendList');
    }
}
