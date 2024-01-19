<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DroneType;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewDroneTypeController extends Controller
{
    public function adminViewDroneType (Request $request){
        $list = DroneType::select(
            'drone_type.id',
            'drone_type.name',
            'drone_type.range',
            'drone_type.loading_weight',
            'drone_type.max_time',
            'drone_type.number_of_drones',
            'drone_type.lend_drones_sum',
        )
             ->where('drone_type.deletion_date', '=', null)
             ->orderBy('drone_type.id', 'asc')
             ->get();
       
        $mergedData = [];
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'name' => $item->name,
                'range' => $item->range. 'km',
                'loading_weight' => $item->loading_weight. 'kg',
                'max_time' => $item->max_time. '分',
                'number_of_drones' => $item->number_of_drones. '個',
                'lend_drones_sum' => $item->lend_drones_sum. '個',
            ];
        }
        
        return view('admin.AdminViewDroneType', compact('mergedData'));
    }
    public function delete(Request $request, $id)
    {
        $B = CoopDrones::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminViewDroneType');
    }
}

