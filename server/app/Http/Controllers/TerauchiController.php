<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\AccountInformation;
use App\Models\AdminInformation;
use App\Models\AdminUser;
use App\Models\ChildAccount;
use App\Models\CoopDrones;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use App\Models\DeliveryLocationImage;
use App\Models\DeliveryRequest;
use App\Models\DroneType;
use App\Models\Favorite;
use App\Models\LicenseInformation;
use App\Models\User;

class TerauchiController extends Controller
{
    public function index (){
        return view('terauchi.top');
    }
    public function login_view(){
        return view('terauchi.login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('users')->attempt($credentials)) {
            $request->session()->regenerate();
            $User = "ログイン成功";
            return view('index', compact('User'));
        }
        $User = "ログイン失敗"; // ログイン失敗時の処理を追加
        return view('index', compact('User'));
    }
    public function list_view(){
        return view('terauchi.list');
    }
    public function detail_view(){
        return view('terauchi.detail_view');
    }
    public function insert_view(){
        return view('terauchi.insert_view');
    }
    public function update_view(){
        return view('terauchi.update_view');
    }
}
