<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewCoopInfoController extends Controller
{
    public function adminViewCoopInfo (Request $request){
        
        $coopName = '事業者名';
        $coopId = '123456';
        $data = [
            'email' => 'example@mail.com',
            'name' => '山田太郎',
            'kanaName' => 'ヤマダタロウ',
            'licence' => '000000000',
            'account' => '口座名',
            'worker' => '500人',
            'phone' => '000-0000-0000',
            'status' => '申請中'];
        return view('admin.AdminViewCoopInfo', compact('coopName', 'coopId', 'data'));
    }
}
