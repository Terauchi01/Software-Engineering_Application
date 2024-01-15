<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryRequest;
use App\Models\CoopUser;
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
        )            
              ->where('delivery_request.deletion_date', '=', null)
              ->orderBy('delivery_request.id', 'asc')
              ->get();
        
        $mergedData = [];
        
        foreach ($list as $item) {         
            $mergedData[] = [
                'id' => $item->id,
                'user_id' => $item->user_id,
                'delivery_destination_id' => $item->delivery_destination_id,
                'collection_company_id' => $item->collection_company_id,
                'delivery_company_id' => $item->delivery_company_id,
            ];
        }

        return view('admin.AdminAllocateCoopDeliveryTask', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        $B = DeliveryRequest::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminAllocateCoopDeliveryTask');
    }
   
}

