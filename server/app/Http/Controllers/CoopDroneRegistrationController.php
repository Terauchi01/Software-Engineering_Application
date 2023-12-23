<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopDroneRegistrationController extends Controller
{
    public function coopRegisterDrone (){
        return view('coop.CoopDroneRegistration');
    }
}
