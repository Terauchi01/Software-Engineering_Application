<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopDroneInfoListController extends Controller
{
    public function coopDroneInfoList (){

        return view('coop.CoopDroneInfoList');
    }
}
