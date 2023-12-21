<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopListController extends Controller
{
    public function adminViewCoopList (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
