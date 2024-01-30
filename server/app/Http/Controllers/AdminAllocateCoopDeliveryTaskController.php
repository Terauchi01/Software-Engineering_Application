<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;
use App\Models\CoopUser;
use App\Models\User;
use App\Models\CoopLocation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminAllocateCoopDeliveryTaskController extends Controller
{
    public function adminAllocateCoopDeliveryTask()
    {
        $list = DeliveryRequest::select(
            'delivery_request.id',
            'delivery_request.user_id',
            'delivery_request.delivery_destination_id',
            'delivery_request.collection_company_id',
            'delivery_request.delivery_company_id',
            'delivery_request.delivery_status',
        )            
            ->where('delivery_request.deletion_date', '=', null)
            ->where('delivery_request.delivery_status', '=', 0)
            ->orderBy('delivery_request.id', 'asc')
            ->get();
    
        $mergedData = [];
        $coopName = CoopUser::pluck('coop_name', 'id')->toArray();
        $sendName = User::pluck('user_last_name', 'id')->toArray();
        $receiveName = User::pluck('user_last_name', 'id')->toArray();

        // 0:未割り振り 1:割り振り済 2:集荷決定,配達未決定 3:配達中 4:配達完了
        $statusName = [
            0 => '未割り振り',
            1 => '割り振り済',
            2 => '集荷決定,配達未決定',
            3 => '配達中',
            4 => '配達完了',
        ];

        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'user_id' => $sendName[$item->user_id],
                'delivery_destination_id' => $receiveName[$item->delivery_destination_id],
                'collection_company_id' => $item->collection_company_id ?? null,
                'delivery_company_id' => $coopName[$item->delivery_company_id]?? null,
                'delivery_status' => $item->delivery_status,
                'delivery_status_name' => $statusName[$item->delivery_status],
            ];
        }
        $coops = CoopUser::where('deletion_date', null)->get();
        return view('admin.AdminAllocateCoopDeliveryTask', compact('mergedData', 'coops'));
    }

    public function delete(Request $request, $id)
    {
        $B = DeliveryRequest::class;
        $currentDateTime = Carbon::now();
        
        $B::where('id',$id)->update(['delivery_request.deletion_date' => $currentDateTime]);     
        return redirect()->route('admin.adminAllocateCoopDeliveryTask');
    }

    public function approval(Request $request) {
        $B = DeliveryRequest::class;
        // $B::where('id', $request['id'])->update(['delivery_status' => 1]);
        $id = $B::where('id', $request['id'])->select('delivery_destination_id','user_id')->get()->toArray();
        $prefecture_id = User::where('id', $id->delivery_destination_id)->select('prefecture_id')->get()->to_Array();
        $prefecture_id2 = User::where('id', $id->user_id)->select('prefecture_id')->get()->to_Array();
        $joinedData = CoopUser::join('coop_location', 'coop_user.id', '=', 'coop_location.coop_user_id')->get();
        $CoopLocation = [];

        // 各coop_user_idに対して処理を行う
        foreach ($joinedData as $data) {
            $coop_user_id = $data->id;

            // 指定されたcoop_user_idが何回出現するかを数える
            $count = DeliveryRequest::where('delivery_status', '=', '0')
                ->where(function ($query) use ($coop_user_id) {
                    $query->where('collection_company_id', $coop_user_id)
                        ->orWhere('intermediate_delivery_company_id', $coop_user_id)
                        ->orWhere('delivery_company_id', $coop_user_id);
                })
                ->count();

            // マージするデータを作成
            $coopLocationData = [
                'coop_user_id' => $coop_user_id,
                'prefecture_id' => $data->prefecture_id, // CoopLocationから取得
                'coop_user_count' => $count,
                'land_or_air' => $data->land_or_air,
            ];

            // $CoopLocationにデータを追加
            $CoopLocation[] = $coopLocationData;
        }

        // coop_user_countで配列をソート
        usort($CoopLocation, function ($a, $b) {
            return $a['coop_user_count'] <=> $b['coop_user_count'];
        });
        if($request['c_coop_id'] == null){
            $filteredArray = array_filter($CoopLocation, function ($item) use ($prefecture_id) {
                return $item['prefecture_id'] == $prefecture_id && $item['land_or_air']==2;
            });
            if(count($filteredArray) == 0){
                $request['c_coop_id'] = 1;
            }
            else{
                $request['c_coop_id'] = $filteredArray[0];
            }
            dd($request['c_coop_id']);
        }
        else if($request['i_coop_id'] == null){
            $filteredArray = array_filter($CoopLocation, function ($item) use ($prefecture_id) {
                return $item['prefecture_id'] == $prefecture_id && $item['land_or_air']==1;
            });
            if(count($filteredArray) == 0){
                $request['i_coop_id'] = 1;
            }
            else{
                $request['i_coop_id'] = $filteredArray[0];
            }
        }
        else if($request['c_coop_id'] == null){
            $filteredArray = array_filter($CoopLocation, function ($item) use ($prefecture_id) {
                return $item['prefecture_id'] == $prefecture_id && $item['land_or_air']==2;
            });
            if(count($filteredArray) == 0){
                $request['i_coop_id'] = 1;
            }
            else{
                $request['i_coop_id'] = $filteredArray[0];
            }
        }
        $B::where('id', $request['id'])->update(['collection_company_id' => $request['c_coop_id']]);
        $B::where('id', $request['id'])->update(['intermediate_delivery_company_id' => $request['i_coop_id']]);
        $B::where('id', $request['id'])->update(['delivery_company_id' => $request['d_coop_id']]);
        return redirect()->route('admin.adminAllocateCoopDeliveryTask');
    }
}

