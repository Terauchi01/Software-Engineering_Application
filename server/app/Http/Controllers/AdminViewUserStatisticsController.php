<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserStatisticsController extends Controller
{
    // 利用者情報分析
    public function adminViewUserStatisticsInfo (){
        //viewの返すところは適当で良い
        return view('user.test');
    }

    public function adminViewUserStatisticsInfoGraph (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
