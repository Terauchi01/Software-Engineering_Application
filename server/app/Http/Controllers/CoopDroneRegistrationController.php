<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopDrones;
use Illuminate\Support\Facades\Auth;

class CoopDroneRegistrationController extends Controller
{
    public function coopRegisterDrone (){
        return view('coop.CoopDroneRegistration');
    }
    public function registerDrone(Request $request)
    {
        $A = 'coops';
        $userId = Auth::guard($A)->id();
        $request->merge([
            'coop_user_id' => $userId,
            'drone_status' => 0,
            'possession_or_loan' => 1,
        ]);
        try {
            $data = $request->validate([
                'drone_type_id' => 'required|exists:drone_type,id',
                'coop_user_id' => 'required|exists:coop_user,id',
                'operating_time' => 'required|integer|min:0',
                'purchase_date' => 'required|date',
                'drone_status' => 'required|integer',
                'possession_or_loan' => 'required|integer',
                'lending_period' => $request->input('possession_or_loan') === '0' ? 'required|date' : '',
            ]);

            CoopDrones::create($data);
    
            return redirect()->route('coop.coopRegisterDrone')->with('success', '登録されました');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
