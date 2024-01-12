<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopDeliveryRequestListController extends Controller
{
    // 事業者宅配依頼一覧
    public function adminViewCoopDeliveryRequestList (){
        //viewの返すところは適当で良い
        return view('admin.adminViewCoopDeliveryRequestList');
    }
}