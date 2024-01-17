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
                'max_number' => $drone->number_of_drones-$drone->lend_drones_sums,
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
        ]);
        try {
            $rules = [
                'user_id' => 'required|integer',
                'drone_type_id' => 'required|integer',
                'number' => 'required|integer',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'deletion_date' => 'nullable|date',
            ];
    
            // バリデーション実行
            $request->validate($rules);

            LentRequest::create($request->all());
    
            return redirect()->route('coop.coopApplyAdminDroneLend')->with('success', '登録されました');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
