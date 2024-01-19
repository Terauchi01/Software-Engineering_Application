<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopDrones;
use Carbon\Carbon;

class AdminEditCoopDroneInfoController extends Controller
{
    public function adminEditCoopDroneInfo ($id){
        $Drone = CoopDrones::find($id);
        if($Drone && $Drone->deletion_date == null){
            return view('admin.AdminEditCoopDroneInfo', compact('Drone'));
        }
        else{
            return back();
        }
    }

    public function editCoopDrone (Request $request){
        $request->validate([
            'drone_type_id' => 'required|integer|exists:drone_type,id',
            'coop_user_id' => 'nullable|integer|exists:coop_user,id',
            'purchase_date' => 'required|date',
            'drone_status' => 'required|integer',
            'possession_or_loan' => 'required|integer',
            'lending_period' => 'nullable|date',
            'operating_time' => 'required|integer',
        ]);
    
        // ドローンの更新処理を実行（例）
        $drone = CoopDrones::find($request->id);
    
        if ($drone && $drone->deletion_date == null) {
            $drone->update($request->all());

            return redirect()->route('admin.adminEditCoopDroneInfo', $drone->id)->with('status', 'Drone updated successfully');
        } else {
            // ドローンが見つからないか削除されている場合の処理
            return redirect()->back()->with('error', 'Drone not found or deleted');
        }
    }
}
