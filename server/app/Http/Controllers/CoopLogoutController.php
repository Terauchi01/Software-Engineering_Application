<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopLogoutController extends Controller
{
    // ログアウト(事業者)
    public function coopLogout (){
        //viewの返すところは適当で良い
        return view('coop.coopLogout');
    }
}
