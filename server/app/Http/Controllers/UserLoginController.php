<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function userLogin (){

        return view('user.UserLogin');
    }
    public function userLoginFunction (Request $request){
        // フォームから送信されたデータを検証
        $credentials = $request->validate([
            'email_address' => ['required'],
            'password' => ['required'],
        ]);

        // ユーザーの認証
        if (Auth::guard('users')->attempt($credentials)) {
            // 認証成功時の処理
            return redirect()->route('user.userDeliveryPlaceRequest'); // ダッシュボードなど適切なルートにリダイレクト
        }

        // 認証失敗時の処理
        return back()->withErrors(['login' => 'ログインに失敗しました。']);
    }
}
