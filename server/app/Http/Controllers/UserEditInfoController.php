<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserEditInfoController extends Controller
{
    public function userEditInfo (){
        //viewの返すところは適当で良い
        return view('user.UserEditInfo');
    }
    public function Edit (Request $request,$id){
        //viewの返すところは適当で良い
        $Class = User::class;
        $Class::where('id',$id)->update(
            [
                'email_address' => $request['email_address'],
                'password' => $request['password'], 
                'post al_code' => $request['postal_code'],
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
        return view('user.User');
    }
}
