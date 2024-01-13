<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserLogoutController extends Controller
{
    public function userLogout (){

        return view('user.UserLogout');
    }

    public function userLogoutFunction (Request $request) {
        if ("true" === $request->input("logout")) {
            Auth::guard('users')->logout();
            return redirect()->route('user.userLogin');
        }
        return redirect()->route('user.userDeliveryRequestList');
    }
}
