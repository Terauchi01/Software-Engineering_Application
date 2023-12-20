<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopStatisticsController extends Controller
{
    // 事業者情報分析
    public function adminViewCoopStatisticsInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }

    public function adminViewCoopStatisticsInfoGraph (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
