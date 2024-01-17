<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MstPrefecture;
use App\Models\Cities;

class AdminViewUserInfoController extends Controller
{
    public function adminViewUserInfo (Request $request){
        $id = $request->input('id');
        $user = User::find($id);

        if ($user && $user->deletion_date === null) {
            $prefecture = MstPrefecture::find($user->prefecture_id)['name'];
            $city = Cities::find($user->city_id)['name'];
                        
            $userId = $user->id;
            $userName = $user->user_last_name . $user->user_first_name;
            $data = [
                'email' => $user->email_address,
                'password' => '**********',
                'address' => '〒' . $user->postal_code . ' ' . $prefecture . ' ' . $city . ' ' . $user->town . ' ' . $user->block,
                'name' => $user->user_last_name . ' ' . $user->user_first_name,
                'kanaName' => $user->user_last_name_kana . ' ' . $user->user_first_name_kana,
                'phone_number' => $user->phone_number,
            ];
            return view('admin.AdminViewUserInfo', compact('userId', 'userName', 'data'));
        }
        $userName = '存在しないユーザです';
        $userId = null;
        return view('admin.AdminViewUserInfo', compact('userName', 'userId'));
    }

}
