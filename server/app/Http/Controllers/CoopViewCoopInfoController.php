<?php

namespace App\Http\Controllers;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use Illuminate\Http\Request;

class CoopViewCoopInfoController extends Controller
{
    public function viewUserInfo (Request $request){
        $id = $request->input('id');
        $user = CoopUser::find($id);
        $user = CoopLocation::find($id);

        if ($user && $user->deletion_date === null) {
            $prefecture = MstPrefecture::find($user->prefecture_id)['name'];
            $city = Cities::find($user->city_id)['name'];
                        
            $userId = $user->id;
            $userName = $user->user_last_name . $user->user_first_name;
            $data = [
                'address' => '〒' . $user->postal_code . ' ' . $prefecture . ' ' . $city . ' ' . $user->town . ' ' . $user->block,
                'name' => $user->user_last_name . ' ' . $user->user_first_name,
                'kanaName' => $user->user_last_name_kana . ' ' . $user->user_first_name_kana,
                'phone_number' => $user->phone_number,
            ];
            return view('coop.CoopViewUserInfo', compact('userId', 'userName', 'data'));
        }
        $userName = '存在しないユーザです';
        $userId = null;
        return view('coop.coopDeliveryRequestList', compact('userName', 'userId'));
    }
}
