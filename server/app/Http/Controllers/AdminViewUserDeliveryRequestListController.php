<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserDeliveryRequestListController extends Controller
{
    public function adminViewUserDeliveryRequestList (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
