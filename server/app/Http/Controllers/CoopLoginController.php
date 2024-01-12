<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoopLoginController extends Controller
{
    // ログイン(事業者)
    public function coopLogin (){
        //viewの返すところは適当で良い
        return view('coop.CoopLogin');
    }
    public function coopLoginFunction (Request $request){
        // フォームから送信されたデータを検証
        $credentials = $request->validate([
            'email_address' => ['required'],
            'password' => ['required'],
        ]);

        // ユーザーの認証
        if (Auth::guard('coops')->attempt($credentials)) {
            // 認証成功時の処理
            return redirect()->route('coop.CoopLogout'); // ダッシュボードなど適切なルートにリダイレクト
        }

        // 認証失敗時の処理
        return back()->withErrors(['login' => 'ログインに失敗しました。']);
    }
}
