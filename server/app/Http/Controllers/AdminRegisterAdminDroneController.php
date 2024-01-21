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
                'number_of_drones' => 'required|integer',
                'name' => 'required|string|max:100',
                'range' => 'required|integer|min:1|max:4294967295',
                'loading_weight' => 'required|integer|min:1|max:4294967295',
                'max_time' => 'required|integer|min:1|max:4294967295',
                'lend_drones_sum' => 'required|integer|min:0|max:4294967295',
            ]);
    
            DroneType::create($data);
    
            return redirect()->route('admin.adminRegisterAdminDrone')->with('success', 'ドローンが登録されました。');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
