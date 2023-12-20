<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    public function adminLogout (){
        return view('user.test');
    }
}
