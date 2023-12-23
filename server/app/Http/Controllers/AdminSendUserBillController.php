<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSendUserBillController extends Controller
{
    public function adminSendUserBill (){
        //viewの返すところは適当で良い
        return view('admin.AdminSendUserBill');
    }
}
