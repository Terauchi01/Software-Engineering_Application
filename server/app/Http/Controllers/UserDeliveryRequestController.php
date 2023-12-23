<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDeliveryRequestController extends Controller
{
    public function userDeliveryRequest (){
        //viewの返すところは適当で良い
        return view('user.UserDeliveryRequest');
    }
}
