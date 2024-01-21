<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DroneType;

class AdminEditAdminDroneController extends Controller
{
    public function adminEditAdminDrone ($id){
        $err = null;
        $Drone = DroneType::find($id);
        if($Drone && $Drone->deletion_date == null){
            return view('admin.AdminEditAdminDrone', compact('Drone', 'err'));
        }
        $err = '存在しないドローンです';
        return view('admin.AdminEditAdminDrone', compact('err'));
    }
    public function editDrone (Request $request){
        $request->validate([
            'number_of_drones' => 'required|integer',
            'name' => 'required|string|max:100',
            'range' => 'required|integer',
            'loading_weight' => 'required|integer',
            'max_time' => 'required|integer',
            'lend_drones_sum' => 'required|integer',
        ]);

        $Drone = DroneType::find($request->id);

        if ($Drone && $Drone->deletion_date == null) {
            $Drone->update($request->all());
            
            return redirect()->route('admin.adminEditAdminDrone', $Drone->id)->with('status', 'ドローン情報の更新が完了しました');
        }
        return redirect()->route('admin.adminEditAdminDrone');
    }
}
