<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserEditInfoController extends Controller
{
    public function userEditInfo (){
        //viewの返すところは適当で良い
        $A = 'users';
        $userId = Auth::guard($A)->id();
        $user = User::find($userId); // ユーザー情報を取得する（Userモデルに合わせて変更）
        return view('user.UserEditInfo', compact('user'));
    }
    public function userEdit (Request $request){
        //viewの返すところは適当で良い
        $A = 'users';
        $userId = Auth::guard($A)->id();
        $Class = User::class;
        $Class::where('id',$userId)->update(
            [
                'email_address' => $request['email_address'],
                'password' => $request['password'], 
                'postal_code' => $request['postal_code'],
                'prefecture_id' => $request['prefecture_id'],
                'city_id' => $request['city_id'],
                'town' => $request['town'],
                'block' => $request['block'],
                'phone_number' => $request['phone_number'],
                'user_last_name' => $request['user_last_name'],
                'user_first_name' => $request['user_first_name'],
                'user_last_name_kana' => $request['user_last_name_kana'],
                'user_first_name_kana' => $request['user_first_name_kana'],
                'unpaid_charge' => $request['unpaid_charge'],
            ]
        );
        //データ確認用後で消して
        // dump($nowUser);
        return $this->userEditInfo();
    }
}
