<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDeliveryRequestListController extends Controller
{
    // 宅配依頼一覧
    public function adminViewCoopDeliveryRequestList (){
        //viewの返すところは適当で良い
        return view('user.test');
    }

    public function adminViewUserDeliveryRequestList (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
