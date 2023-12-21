<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSendCoopBillController extends Controller
{
    public function adminSendCoopBill (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
