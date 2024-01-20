<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;
use App\Models\CoopUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserDeliveryRequestListController extends Controller
{
    public function userDeliveryRequestList (){
        $list = DeliveryRequest::select(
            'delivery_request.id',
            'delivery_request.item',
            'delivery_request.user_id',
            'delivery_request.delivery_destination_id',
        )            
            ->where('delivery_request.deletion_date', '=', null)
            ->orderBy('delivery_request.id', 'asc')
            ->get();
        
        $mergedData = [];
        $sendName = User::pluck('user_last_name', 'id')->toArray();
        $receiveName = User::pluck('user_last_name', 'id')->toArray();
        foreach ($list as $item) {         
            $mergedData[] = [
                'id' => $item->id,
                'item' => $item->item,
                'user_id' => $sendName[$item->user_id],
                'delivery_destination_id' => $receiveName[$item->delivery_destination_id],
            ];
        }
        
        return view('user.UserDeliveryRequestList', compact('mergedData'));
    }
    public function delete(Request $request, $id)
    {
        $B = DeliveryRequest::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('user.userDeliveryRequestList');
    }
}
