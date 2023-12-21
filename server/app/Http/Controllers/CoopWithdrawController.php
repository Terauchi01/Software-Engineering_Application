<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopWithdrawController extends Controller
{
    public function coopWithdraw (){
  
        return view('coop.withdraw');
    }
}
