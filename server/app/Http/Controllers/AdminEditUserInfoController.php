<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MstPrefecture;
use App\Models\Cities;

class AdminEditUserInfoController extends Controller
{
    public function adminEditUserInfo ($id) {
        $id;
        $user = User::find($id);

        if ($user && $user->deletion_date === null) {
            $prefecture = MstPrefecture::find($user->prefecture_id)['name'];
            $city = Cities::find($user->city_id)['name'];
                
            $userId = $user->id;
            $userName = $user->user_last_name . $user->user_first_name;
            $data = [
                'email' => $user->email_address,
                'password' => '**********',
                'postal_code' => $user->postal_code,
                'prefecture' => $prefecture,
                'city' => $city,
                'town' => $user->town,
                'block' => $user->block,
                'phone_number' => $user->phone_number,
                'last_name' => $user->user_last_name,
                'first_name' => $user->user_first_name,
                'last_name_kana' => $user->user_last_name_kana,
                'first_name_kana' => $user->user_first_name_kana
            ];
            return view('admin.AdminEditUserInfo', compact('userId', 'userName', 'data'));
        }
        $userName = '存在しないユーザです';
        $userId = null;
        return view('admin.AdminEditUserInfo', compact('userName', 'userId'));
    }
    public function adminEditUserInfoApply (Request $request){
        $id = $request->input('id');
        $user = User::find($id);

        if ($user && $user->delettion_date === null) {
            if ($request['password'] === null) $password = $user['password'];
            else $password = $request['password'];
            $user->update([
                'email_address' => $request['email'],
                'password' => $password,
                'postal_code' => $request['postal_code'],
                'prefecture_id' => MstPrefecture::where('name', $request['prefecture'])->value('id'),
                'city_id' => Cities::where('name', $request['city'])->value('id'),
                'town' => $request['town'],
                'block' => $request['block'],
                'phone_number' => $request['phone_number'],
                'user_last_name' => $request['last_name'],
                'user_first_name' => $request['first_name'],
                'user_last_name_kana' => $request['last_name_kana'],
                'user_first_name_kana' => $request['first_name_kana']
            ]);
            return redirect()->route('admin.adminViewUserInfo', ['id' => $id]);
        }
        return redirect()->route('admin.adminViewUserInfo');
    }
}
