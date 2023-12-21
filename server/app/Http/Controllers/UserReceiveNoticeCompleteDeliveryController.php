<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserReceiveNoticeCompleteDeliveryController extends Controller
{
    public function userReceiveNoticeCompleteDelivery (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
