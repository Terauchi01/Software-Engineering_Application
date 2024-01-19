<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopDrones;
use App\Models\DroneType;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewCoopDroneInfoController extends Controller
{
    public function adminViewCoopDroneInfo(Request $request)
    {
        $id = $request->input('id');
        $coop = CoopDrones::where('coop_user_id', $id)->first();
        $mergedData = [];

        if ($coop && $coop->deletion_date === null) {
            $coopUser = CoopUser::find($id);
            $coopName = $coopUser ? $coopUser->coop_name : '存在しないユーザです';
            $list = CoopDrones::select(
                'coop_drones.coop_user_id',
                'coop_drones.drone_type_id',             
                'coop_drones.possession_or_loan'
            )                       
                  ->where('coop_drones.deletion_date', '=', null)
                  ->orderBy('coop_drones.id', 'asc')
                  ->get();

            $droneType = DroneType::pluck('name', 'id')->toArray();
            
            foreach ($list as $item) {
                $having = ($item->possession_or_loan == 0) ? '借り' : '所持';
                $mergedData[] = [              
                    'drone_type_id' => $droneType[$item->drone_type_id],
                    'possession_or_loan' => $having,
                ];
            }
        
            return view('admin.AdminViewCoopDroneInfo', compact('mergedData', 'coopName'));
        }

        $coopName = '存在しないユーザです';
        return view('admin.AdminViewCoopDroneInfo', compact('mergedData', 'coopName'));
    }
}

