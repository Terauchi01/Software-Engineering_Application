<?php

namespace App\Http\Controllers;

use App\Models\CoopDrones;
use Illuminate\Http\Request;
use App\Models\LentRequest;
use App\Models\DroneType;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
              ->where("end_date",'>=',today())
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
        try {
            DB::transaction(function () use ($id) {
                $LentRequest = LentRequest::find($id);
                $LentRequest->update(['state' => 1]);
        
                $DroneType = DroneType::find($LentRequest->drone_type_id);
                // dump($DroneType->number_of_drones);
                // dump($DroneType->lend_drones_sum);
                // dd($DroneType->lend_drones_sum + $LentRequest->number);
                if ($DroneType->number_of_drones >= $DroneType->lend_drones_sum + $LentRequest->number) {
                    $DroneType->update(['lend_drones_sum' => $DroneType->lend_drones_sum + $LentRequest->number]);
        
                    $purchase_date = $LentRequest->start_date;
                    if ($LentRequest->start_date < today()) {
                        $purchase_date = today();
                    }
        
                    $CoopDronesdata = [
                        'drone_type_id' => $DroneType->id,
                        'coop_user_id' => $LentRequest->user_id,
                        'operating_time' => 0,
                        'purchase_date' => $purchase_date,
                        'drone_status' => 0,
                        'possession_or_loan' => 0,
                        'lending_period' => $LentRequest->end_date,
                    ];
        
                    $validator = validator($CoopDronesdata, [
                        'drone_type_id' => 'required|exists:drone_type,id',
                        'coop_user_id' => 'required|exists:coop_user,id',
                        'operating_time' => 'required|integer|min:0',
                        'purchase_date' => 'required|date',
                        'drone_status' => 'required|integer',
                        'possession_or_loan' => 'required|integer',
                        'lending_period' => 'required|date',
                    ]);
                    if ($validator->fails()) {
                        throw new \Exception('Validation failed');
                    }
                    $validatedData = $validator->validated();
                    CoopDrones::create($validatedData);
                } else {
                    throw new \Exception('Lending limit exceeded');
                }
            });
            return redirect()->route('admin.adminViewCoopApplyDroneLendList')->with('success', '承認しました');
        } catch (\Exception $e) {
            return redirect()->route('admin.adminViewCoopApplyDroneLendList')->withErrors(['message' => $e->getMessage()]);
        }
    }
}
