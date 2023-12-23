<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDeliveryPlaceRequestController extends Controller
{
    public function userDeliveryPlaceRequest (){
        //viewの返すところは適当で良い
        return view('user.UserDeliveryPlaceRequest');
    }
}
