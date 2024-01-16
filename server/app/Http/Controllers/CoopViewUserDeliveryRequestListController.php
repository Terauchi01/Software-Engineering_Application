<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use App\Models\User;
use App\Models\DeliveryRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CoopViewUserDeliveryRequestListController extends Controller
{
    public function CoopViewUserDeliveryRequestList (){
         $list = DeliveryRequest::select(
            'delivery_request.id',
            'delivery_request.user_id',
            'delivery_request.delivery_destination_id',
            'delivery_request.collection_company_id',
            'delivery_request.delivery_company_id',
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
                'user_id' => $sendName[$item->user_id],
                'delivery_destination_id' => $receiveName[$item->delivery_destination_id],
            ];
        }        
        return view('coop.CoopViewUserDeliveryRequestList', compact('mergedData'));
    }

}
