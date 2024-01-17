<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopDrones;
use App\Models\DroneType;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CoopDroneInfoListController extends Controller
{
    public function coopDroneInfoList() {
        $coopId=Auth::guard('coops')->id();
        $list = CoopDrones::select(
            'coop_drones.id',
            'coop_user_id',
            'coop_drones.drone_type_id',
            'coop_drones.drone_status'
        )
              ->where('coop_drones.coop_user_id', '=', $coopId)
              ->where('coop_drones.deletion_date', '=', null)
              ->orderBy('coop_drones.id', 'asc')
              ->get();
        
        $mergedData = [];
        $data = DroneType::pluck('name', 'id')->toArray();
        foreach ($list as $item) {
            $droneStatus = ($item->drone_status == 0) ? '待機中' : '稼働中';
            $mergedData[] = [
                'id' => $item->id,
                'drone_type_id' => $data[$item->drone_type_id],
                'drone_status' => $droneStatus
            ];
        }        
        return view('coop.CoopDroneInfoList', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        $B = CoopDrones::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminAllocateCoopDeliveryTask');
    }
}

