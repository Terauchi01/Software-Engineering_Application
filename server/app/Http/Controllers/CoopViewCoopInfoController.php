<?php

namespace App\Http\Controllers;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use Illuminate\Http\Request;

class CoopViewCoopInfoController extends Controller
{
    public function viewCoopInfo (Request $request){
        $id = $request->input('id');
        $coop = CoopUser::with('location')->find($id);
        // dump($coop);
        // $user = CoopUser::find($id);
        // $user_location = CoopLocation::where("user_id",$id)->first();

        if ($coop && $coop->deletion_date === null) {
            $prefecture = MstPrefecture::find($coop->location->prefecture_id)['name'];
            $city = Cities::find($coop->location->city_id)['name'];
            $coopId = $coop->id;
            $coopName = $coop->coop_name;
            $lor = [
                1 => '陸運',
                2 => '空運'
            ];
            $data = [
                'email' => $coop->email_address,
                'name' => $coop->representative_last_name . $coop->representative_first_name,
                'kanaName' => $coop->representative_last_name_kana . $coop->representative_first_name_kana,
                'postal_code' => $coop->location->postal_code,
                'address' => $prefecture . ' ' . $city . ' ' . $coop->location->town . ' ' . $coop->location->block,
                'worker' => $coop->employees . '人',
                'phone' => $coop->phone_number,
                'land_or_air' => $lor[$coop->land_or_air],
            ];
            return view('coop.CoopViewCoopInfo', compact('coopName', 'coopId', 'data'));
        }
        $userName = '存在しないユーザです';
        $userId = null;
        return view('coop.coopDeliveryRequestList', compact('userName', 'userId'));
    }
}
