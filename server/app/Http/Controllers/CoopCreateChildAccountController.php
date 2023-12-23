<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopCreateChildAccountController extends Controller
{
    public function coopPublishChildCoopAccount (){
        return view('coop.CoopCreateChildAccount');
    }
}
