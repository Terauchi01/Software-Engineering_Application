<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DroneType;

class AdminRegisterAdminDroneController extends Controller
{
    public function adminRegisterAdminDrone (){
        //viewの返すところは適当で良い
        return view('admin.AdminRegisterAdminDrone');
    }

    public function registerDrone(Request $request)
    {
        $request->merge(['lend_drones_sum' => 0]);
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'range' => 'required|numeric',
                'loading_weight' => 'required|numeric',
                'max_time' => 'required|numeric',
                'number_of_drones' => 'required|integer',
                'lend_drones_sum' => 'required|integer',
            ]);
    
            // バリデーションが通った場合の処理
            // ここにデータベースへの保存などの処理を記述
    
            return redirect()->route('admin.adminRegisterAdminDrone')->with('success', 'ドローンが登録されました。');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
