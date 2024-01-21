<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;
use App\Models\CoopUser;
use App\Models\User;
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
                'collection_company_id' => $item->collection_company_id,
                'delivery_company_id' => $coopName[$item->delivery_company_id],
                'delivery_status' => $item->delivery_status,
                'delivery_status_name' => $statusName[$item->delivery_status],
            ];
        }

        return view('admin.AdminAllocateCoopDeliveryTask', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        $B = DeliveryRequest::class;
        $currentDateTime = Carbon::now();
        
        $B::where('id',$id)->update(['delivery_status' => $currentDateTime]);
        return redirect()->route('admin.adminAllocateCoopDeliveryTask');
    }

    public function approval(Request $request, $id)
    {
        $B = DeliveryRequest::class;
        $B::where('id',$id)->update(['delivery_status' => 1]);
        return redirect()->route('admin.adminAllocateCoopDeliveryTask');
    }
}

