<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MstPrefecture;
use App\Models\Cities;

class AdminEditUserInfoController extends Controller
{
    public function adminEditUserInfo (Request $request) {
        $id = $request->input('id');
        $user = User::find($id);

        if ($user && $user->deletion_date === null) {
            $prefectures = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();
            $cities = Cities::orderBy('id')
                ->get(['id', 'prefecture_id', 'name'])
                ->groupBy('prefecture_id')
                ->map(function ($items) {
                    return $items->pluck('name', 'id')->toArray();
                })
                ->toArray();
            $cities[0] = $user->city_id;
                
            $userId = $user->id;
            $userName = $user->user_last_name . $user->user_first_name;
            $data = [
                'email' => $user->email_address,
                'password' => '**********',
                'postal_code' => $user->postal_code,
                'prefecture' => $user->prefecture_id,
                'city' => $user->city_id,
                'town' => $user->town,
                'block' => $user->block,
                'phone_number' => $user->phone_number,
                'last_name' => $user->user_last_name,
                'first_name' => $user->user_first_name,
                'last_name_kana' => $user->user_last_name_kana,
                'first_name_kana' => $user->user_first_name_kana
            ];
            return view('admin.AdminEditUserInfo', compact('userId', 'userName', 'prefectures', 'cities', 'data'));
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
                'prefecture_id' => $request['prefecture_id'],
                'city_id' => $request['city_id'],
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
