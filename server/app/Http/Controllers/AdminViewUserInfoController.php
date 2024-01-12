<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserInfoController extends Controller
{
    public function adminViewUserInfo (Request $request){

        $userName = '利用者名';
        $userId = '987654';
        $data = [
            'email' => 'example@mail.com',
            'address' => 'わかめ県ぴよぴよ町',
            'name' => '山田太郎',
            'kanaName' => 'ヤマダタロウ',
        ];
        return view('admin.AdminViewUserInfo', compact('userName', 'userId', 'data'));
    }
}
