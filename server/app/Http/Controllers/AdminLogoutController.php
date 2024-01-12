<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    public function adminLogout (){
        //viewの返すところは適当で良い
        return view('admin.AdminLogout');
    }

    public function adminLogoutFunction (Request $request) {
        if ("true" === $request->input("logout")) {
            Auth::guard('admins')->logout();
            return redirect()->route('admin.adminLogin');
        }
        return redirect()->route('admin.AdminAllocateCoopDeliveryTask'); // tmp
    }
}
