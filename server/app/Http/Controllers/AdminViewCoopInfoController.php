<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopUser;
use App\Models\AccountInformation;

class AdminViewCoopInfoController extends Controller
{
    public function adminViewCoopInfo (Request $request){
        $id = $request->input('id');
        $coop = CoopUser::find($id);

        if ($coop && $coop->deletion_date === null) {
            $acc = AccountInformation::find($coop->account_information_id);
                        
            $coopId = $coop->id;
            $coopName = $coop->coop_name;
            $data = [
                'email' => $coop->email_address,
                'name' => $coop->representative_last_name . $coop->representative_first_name,
                'kanaName' => $coop->representative_last_name_kana . $coop->representative_first_name_kana,
                'license' => $coop->license_information_id,
                'account' => $acc->bank_id . ' ' . $acc->branch_id . ' ' . $acc->account_type . ' ' . $acc->account_number,
                'worker' => $coop->employees . '人',
                'phone' => $coop->phone_number,
                'status' => $coop->application_status];
            return view('admin.AdminViewCoopInfo', compact('coopName', 'coopId', 'data'));
        }
        
        $coopName = '存在しないユーザです';
        $coopId = null;
        return view('admin.AdminViewCoopInfo', compact('coopName', 'coopId'));
    }
}
