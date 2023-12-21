<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopStatisticsInfoController extends Controller
{
    public function adminViewCoopStatisticsInfo (){
        //viewの返すところは適当で良い
        return view('admin.adminViewCoopStatisticsInfo');
    }
    public function adminViewCoopStatisticsInfoGraph (){
        //viewの返すところは適当で良い
        return view('admin.adminViewCoopStatisticsInfo');
    }
}
