<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//事業者一覧

class AdminViewCoopListController extends Controller
{
    public function adminViewCoopList (){
        $CoopLocation = CoopLocation::all();
        $list = CoopUser::select(
            'coop_user.id',
            'coop_user.coop_name',
            'coop_user.representative_last_name',
            'coop_user.representative_first_name',
            'coop_user.pay_status',
            'coop_user.child_status',
            'coop_user.pair_id',
            'coop_user.deletion_date',
            'coop_location.postal_code',
            'coop_location.prefecture_id',
            'coop_location.city_id',
            'coop_location.town',
            'coop_location.block'
        )
        ->where('coop_user.deletion_date', '=', null)
        ->where('coop_location.deletion_date', '=', null)
        ->join('coop_location', 'coop_user.id', '=', 'coop_location.coop_user_id')
        ->orderBy('coop_user.id', 'asc') 
        ->get();
        $Prefecture_list = MstPrefecture::pluck('name', 'id')->toArray();
        $Cities_list = Cities::pluck('name', 'id')->toArray();
        $mergedData = [];
        $A=['未','済'];
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'coop_name' => $item->coop_name,
                'representative_name' => $item->representative_last_name." ".$item->representative_first_name,
                'coop_locations' => $Prefecture_list[$item->prefecture_id].$Cities_list[$item->city_id],
                'pay_status' => $A[$item->pay_status],
                //使いそうだから一応コメントアウト
                // 'child_status' => $item->child_status,
                // 'pair_id' => $item->pair_id,
                // 'postal_code' => $item->postal_code,
                // 'prefecture_id' => $item->prefecture_id,
                // 'city_id' => $item->city_id,
                // 'town' => $item->town,
                // 'block' => $item->block,
            ];
        }
        // ksort($mergedData);
        // //データ参照用、後で消してs
        // dump($mergedData);
        // dump($mergedData[0]);
        // dump($mergedData[0]['coop_locations']);
        //viewの返すところは適当で良い
        // $id = ['1', '2', '3'];
        // $coop_name = ['土佐山田配送', '高知配送', '南国配送'];
        // $representative_name = ['山田太郎', '高知花子', '南国次郎'];
        // $coop_locations_list_id = ['土佐山田', '高知', '南国'];
        // $pay_status = ['済', '済', '未'];
        // $land_or_air = ['1', '0', '1'];
        return view('admin.AdminViewCoopList', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        // $coopId を使用して削除などの処理を行う
        // CoopUser::destroy($id);
        // レスポンスを返す（任意のメッセージを含める）
        $B = CoopUser::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return response()->header('Refresh', '2;url=' . route('admin.adminViewCoopList'));
    }
}
// id
// coop_name
// representative_name
// coop_locations_list_id
// land_or_air
