<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminLogin (){
        //viewの返すところは適当で良い
        return view('admin.AdminLogin');
    }
    public function adminLoginFunction (Request $request){
        // フォームから送信されたデータを検証
        $credentials = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        // ユーザーの認証
        if (Auth::guard('admins')->attempt($credentials)) {
            // 認証成功時の処理
            return redirect()->route('admin.adminAllocateCoopDeliveryTask'); // ダッシュボードなど適切なルートにリダイレクト
        }

        // 認証失敗時の処理
        return back()->withErrors(['login' => 'ログインに失敗しました。']);
    }
}
