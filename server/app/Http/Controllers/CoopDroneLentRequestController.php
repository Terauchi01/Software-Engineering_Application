<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LentRequest;
use App\Models\CoopUser;
use App\Models\DroneType;

class CoopDroneLentRequestController extends Controller
{
    public function coopApplyAdminDroneLend (){
        $Drone = DroneType::select(
            'id',
            'name',
            'range',
            'loading_weight',
            'max_time',
            'number_of_drones',
            'lend_drones_sum',
        )->orderBy('id')->get();

        $droneInfoArray = [];

        foreach ($Drone as $drone) {
            $droneInfoArray[$drone->id] = [
                'name' => $drone->name,
                'range' => $drone->range,
                'loading_weight' => $drone->loading_weight,
                'max_time' => $drone->max_time,
                'number_of_drones' => $drone->number_of_drones,
                'lend_drones_sum' => $drone->lend_drones_sum,
            ];
        }
        return view('coop.CoopDroneLentRequest',compact('droneInfoArray'));
    }
    public function applyDroneLend (Request $request){
        $A = 'coops';
        $userId = Auth::guard($A)->id();
        $request->merge([
            'user_id' => $userId,
            'deletion_date' => null,
            'state' => 0,
        ]);
        try {
            $rules = [
                'user_id' => 'required|integer|exists:coop_user,id',
                'drone_type_id' => 'required|integer|exists:drone_type,id',
                'number' => 'required|integer|min:1|max:2147483647',
                'state' => 'required|integer|min:0|max:1',
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date',
            ];
            $drone = DroneType::find($request->drone_type_id);
            $request->validate($rules);
            if($request->number <= ($drone->number_of_drones)-($drone->lend_drones_sum)){
                LentRequest::create($request->all());
                return redirect()->route('coop.coopApplyAdminDroneLend')->with('success', '登録されました');
            }
            else{
                return redirect()->route('coop.coopApplyAdminDroneLend')->withErrors(['message' => '借りれる最大数を超えています']);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
