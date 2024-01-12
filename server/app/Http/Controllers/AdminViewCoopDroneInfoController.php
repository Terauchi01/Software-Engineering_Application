<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopDroneInfoController extends Controller
{
    public function adminViewCoopDroneInfo (){
        //viewの返すところは適当で良い
        $id = ['1', '2'];
        $drone_info = ['ドローンA: 100個　残り: 30個', 'ドローンB: 70個　残り: 20個'];
        $coop_name = ['事業者A', '事業者B'];
        return view('admin.AdminViewCoopDroneInfo', compact('id', 'drone_info', 'coop_name'));
    }
}
