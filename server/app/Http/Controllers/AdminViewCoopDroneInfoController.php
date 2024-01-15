<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopDrones;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewCoopDroneInfoController extends Controller
{
    public function adminViewCoopDroneInfo (){
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
        
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'drone_type_id' => $item->drone_type_id,
                'coop_user_id' => $item->coop_user_id,
                'drone_status' => $item->drone_status,
            ];
        }
        
        return view('admin.AdminViewCoopDroneInfo', compact('mergedData'));
    }
    public function delete(Request $request, $id)
    {
        $B = CoopDrones::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminViewCoopDroneInfo');
    }
}

