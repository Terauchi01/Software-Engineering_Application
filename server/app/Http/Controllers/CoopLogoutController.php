<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CoopLogoutController extends Controller
{
    // ログアウト(事業者)
    public function coopLogout (){
        //viewの返すところは適当で良い
        return view('coop.CoopLogout');
    }

    public function coopLogoutFunction (Request $request) {
        if ("true" === $request->input("logout")) {
            Auth::guard('coops')->logout();
            return redirect()->route('coop.coopLogin');
        }
        return redirect()->route('coop.CoopCheckUserDeliveryRequestListViewExecute');
    }
}
