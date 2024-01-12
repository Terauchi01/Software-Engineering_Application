<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRegistrationController extends Controller
{
    public function userRegisterView (){
        return view('user.UserRegistration');
    }
    public function userRegister(Request $request){
        $Class = User::class;
        $newUserData = [
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
        ];
        $Class::create($newUserData);
        //データ確認用後で消して
        dump($newUserData);
        return view('user.UserRegistration');
    }
}
