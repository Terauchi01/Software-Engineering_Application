<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DroneType;

class AdminEditAdminDroneController extends Controller
{
    public function adminEditAdminDrone ($id){
        $Drone = DroneType::find($id);
        if($Drone && $Drone->deletion_date == null){
            return view('admin.AdminEditAdminDrone', compact('Drone'));
        }
        else{
            return back();
        }
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

            return redirect()->route('admin.adminEditAdminDrone', $Drone->id)->with('status', 'Drone updated successfully');
        } else {
            // ドローンが見つからないか削除されている場合の処理
            return redirect()->back()->with('error', 'Drone not found or deleted');
        }
    }
}
