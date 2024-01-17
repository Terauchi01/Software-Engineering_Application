<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopUser;
use App\Models\AccountInformation;

class AdminViewCoopPayInfoController extends Controller
{
    public function adminViewCoopPayInfo (Request $request){
        $id = $request->input('id');
        $coop = CoopUser::find($id);

        if ($coop && $coop->deletion_data === null) {
            $acc = AccountInformation::find($coop->account_information_id);
            $coopName = $coop->coop_name;
            $coopId = $coop->id;
            $data = [
                'pay' => $coop->amount_of_compensation . '円',
                'bank' => $acc->bank_id,
                'branch' => $acc->branch_id,
                'type' => $acc->account_type,
                'number' => $acc->account_number,
                'name' => $acc->account_name
            ];
            return view('admin.AdminViewCoopPayInfo', compact('coopName', 'coopId', 'data'));
        }
        $coopName = '存在しないユーザです';
        $coopId = null;
        return view('admin.AdminViewCoopPayInfo', compact('coopName', 'coopId'));
    }
}
