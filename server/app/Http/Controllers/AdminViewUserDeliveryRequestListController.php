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
        $id = $request->input('id');
        
        $query = DeliveryRequest::select(
            'delivery_request.id',
            'delivery_request.user_id',
            'delivery_request.delivery_destination_id',
            'delivery_request.collection_company_id',
            'delivery_request.delivery_company_id',
        )            
              ->where('delivery_request.deletion_date', '=', null)
              ->orderBy('delivery_request.id', 'asc');
        
        if ($id) {
            $query->where('delivery_request.user_id', '=', $id);
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

