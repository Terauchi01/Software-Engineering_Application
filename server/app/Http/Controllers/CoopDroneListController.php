<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopDroneListController extends Controller
{
    public function coopViewOwnDrone (){
        return view('coop.CoopDroneList');
    }
}
