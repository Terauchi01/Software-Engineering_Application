<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MstPrefecture;
use App\Models\Cities;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $newUserData = $request->validate([
            'email_address' => [
                'required',
                'email',
                'max:100',
                Rule::unique('user', 'email_address')->whereNull('deletion_date'),
            ],
            'password' => 'required|string|max:255',
            'prefecture_id' => 'required|string|max:100',
            'city_id' => 'required|string|max:100',
            'town' => 'required|string|max:100',
            'block' => 'nullable|string|max:100',
            'postal_code' => 'required|integer',
            'phone_number' => 'required|string|max:11',
            'user_last_name' => 'required|string|max:100',
            'user_first_name' => 'required|string|max:100',
            'user_last_name_kana' => 'required|string|max:300',
            'user_first_name_kana' => 'required|string|max:300',
            'unpaid_charge' => 'integer',
        ]);
        $newUserData['password'] = Hash::make($newUserData['password']);
        $Class::create($newUserData);
        return redirect()->route('user.userLogin')->withErrors(['login' => '登録が完了しました']);
    }
}
