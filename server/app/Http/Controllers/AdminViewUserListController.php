<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserListController extends Controller
{
    public function adminViewUserList (){
        //viewの返すところは適当で良い
        return view('user.test');
    }
}
