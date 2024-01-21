<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;
use App\Models\CoopUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewUserDeliveryRequestListController extends Controller
{
    public function adminViewUserDeliveryRequestList(Request $request)
    {
        $send_id = $request->input('send_id');
        $receive_id = $request->input('receive_id');
    
        $query = DeliveryRequest::select(
            'delivery_request.id',
            'delivery_request.user_id',
            'delivery_request.delivery_destination_id',
            'delivery_request.collection_company_id',
            'delivery_request.delivery_company_id',
        )            
               ->where('delivery_request.deletion_date', '=', null)
               ->where('delivery_request.delivery_status', '!=', 0)
               ->orderBy('delivery_request.id', 'asc');
    
        if ($send_id) {
            $query->where(function($query) use ($send_id) {
                $query->where('delivery_request.user_id', '=', $send_id)
                      ->orWhere('delivery_request.delivery_destination_id', '=', $send_id);
            });
        }

        if ($receive_id) {
            $query->where(function($query) use ($receive_id) {
                $query->where('delivery_request.user_id', '=', $receive_id)
                      ->orWhere('delivery_request.delivery_destination_id', '=', $receive_id);
            });
        }
        
        $list = $query->get();
        $mergedData = [];
        $coopName = CoopUser::pluck('coop_name', 'id')->toArray();
        $sendName = User::pluck('user_last_name', 'id')->toArray();
        $receiveName = User::pluck('user_last_name', 'id')->toArray();
        foreach ($list as $item) {         
            $mergedData[] = [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'user_name' => $sendName[$item->user_id],
                'delivery_destination_id' => $item->delivery_destination_id,
                'delivery_destination_name' => $receiveName[$item->delivery_destination_id],
                'collection_company_id' => $item->collection_company_id,
                'delivery_company_id' => $coopName[$item->delivery_company_id],
            ];
        }

        return view('admin.AdminViewUserDeliveryRequestList', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        $B = DeliveryRequest::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminViewUserDeliveryRequestList');
    }
   
}

