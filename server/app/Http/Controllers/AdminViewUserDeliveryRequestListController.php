<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserDeliveryRequestListController extends Controller
{
    public function adminViewUserDeliveryRequestList (){

        return view('admin.AdminViewUserDeliveryRequestList');
    }
}
