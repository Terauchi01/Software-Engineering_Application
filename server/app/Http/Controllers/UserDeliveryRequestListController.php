<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDeliveryRequestListController extends Controller
{
    public function userDeliveryRequestList (){
        //viewの返すところは適当で良い
        return view('user.UserDeliveryRequestList');
    }
}
