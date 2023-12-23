<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserListController extends Controller
{
    public function adminViewUserList (){
        return view('admin.AdminViewUserList');
    }
}
