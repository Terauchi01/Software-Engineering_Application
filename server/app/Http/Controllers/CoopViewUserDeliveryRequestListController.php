<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopViewUserDeliveryRequestListController extends Controller
{
    public function CoopViewUserDeliveryRequestList (){
        return view('coop.CoopViewUserDeliveryRequestList');
    }
}
