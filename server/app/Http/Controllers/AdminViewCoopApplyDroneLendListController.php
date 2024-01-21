<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LentRequest;
use App\Models\DroneType;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewCoopApplyDroneLendListController extends Controller
{
    public function AdminViewCoopApplyDroneLendList (){
        $list = LentRequest::select(
            'id',
            'user_id',
            'drone_type_id',
            'number',
            'state',
            'start_date',
            'end_date'
        )
              ->where('deletion_date', '=', null)
              ->where('state', '=', 0)
              ->orderBy('id', 'asc')
              ->get();
       
        $mergedData = [];
        $stateName = [
            0 => '未承認',
            1 => '承認済',
        ];
        $droneName = DroneType::pluck('name', 'id')->toArray();
        $coopName = CoopUser::pluck('coop_name', 'id')->toArray();
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,             
                'user_id' => $coopName[$item->user_id],
                'drone_type_id' => $droneName[$item->drone_type_id],
                'number' => $item->number. '個',
                'state' => $stateName[$item->state],
                'start_date' => $item->start_date,
                'end_date' => $item->end_date,
            ];
        }
        
        return view('admin.AdminViewCoopApplyDroneLendList', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        $B = LentRequest::class;
        $currentDateTime = Carbon::now();
        
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminViewCoopApplyDroneLendList');
    }

    public function approval(Request $request, $id)
    {
        $B = LentRequest::class;
        $B::where('id',$id)->update(['state' => 1]);
        return redirect()->route('admin.adminViewCoopApplyDroneLendList');
    }
}
