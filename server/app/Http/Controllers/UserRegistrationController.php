<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MstPrefecture;
use App\Models\Cities;

class UserRegistrationController extends Controller
{
    public function userRegisterView (){
        // 都道府県をidでソートして取得
        $Prefecture = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();

        // 市区町村をidでソートして取得
        $cityCollection = Cities::orderBy('id')->select('id', 'prefecture_id', 'name')->get();
        // コレクションをprefecture_idをキーにした連想配列に変換
        $Cities = $cityCollection->groupBy('prefecture_id')->map(function ($items) {
            return $items->pluck('name', 'id')->toArray();
        })->toArray();
        return view('user.UserRegistration',compact('Prefecture','Cities'));
    }
    public function userRegister(Request $request){
        $request->merge([
            'unpaid_charge' => 0,
        ]);
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
        return redirect()->route('user.userRegisterView')->with('success', '配送が登録されました。');
    }
}
