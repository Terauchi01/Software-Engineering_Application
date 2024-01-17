<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopDrones;
use App\Models\DroneType;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewCoopApplyDroneLendListController extends Controller
{
    public function AdminViewCoopApplyDroneLendList (){
        $list = CoopDrones::select(
            'coop_drones.id',
            'coop_drones.drone_type_id',
            'coop_drones.coop_user_id',
            'coop_drones.drone_status',
        )
              ->where('coop_drones.deletion_date', '=', null)
              ->orderBy('coop_drones.id', 'asc')
              ->get();
       
        $mergedData = [];
        $droneType = DroneType::pluck('name', 'id')->toArray();
        $coopName = CoopUser::pluck('coop_name', 'id')->toArray();
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'drone_type_id' => $droneType[$item->drone_type_id],
                'coop_user_id' => $coopName[$item->coop_user_id],
                'drone_status' => $item->drone_status,
            ];
        }
        
        return view('admin.AdminViewCoopApplyDroneLendList', compact('mergedData'));
    }
}
