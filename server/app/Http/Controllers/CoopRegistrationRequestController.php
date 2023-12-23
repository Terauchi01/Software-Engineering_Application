<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopRegistrationRequestController extends Controller
{
    // 事業者登録申請
    public function coopApplyCoopRegister (){
        //viewの返すところは適当で良い
        return view('coop.coopRegistrationRequest');
    }
}
