<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopDroneLentRequestController extends Controller
{
    public function coopApplyAdminDroneLend (){
        return view('coop.CoopDroneLentRequest');
    }
}
