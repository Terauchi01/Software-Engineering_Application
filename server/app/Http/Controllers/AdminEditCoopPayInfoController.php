<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopUser;
use App\Models\AccountInformation;

class AdminEditCoopPayInfoController extends Controller
{
    public function adminEditCoopPayInfo ($id){
        $coop = CoopUser::find($id);

        if ($coop && $coop->deletion_date === null) {
            $acc = AccountInformation::find($coop->account_information_id);
            $coopName = $coop->coop_name;
            $coopId = $coop->id;
            $data = [
                'pay_status' => $coop->pay_status,
                'pay' => $coop->amount_of_compensation,
                'bank' => $acc->bank_id,
                'branch' => $acc->branch_id,
                'type' => $acc->account_type,
                'number' => $acc->account_number,
                'name' => $acc->account_name
            ];
            return view('admin.AdminEditCoopPayInfo', compact('coopName', 'coopId', 'data'));
        }
        return redirect()->route('admin.adminViewCoopPayInfo');
    }
    public function adminEditCoopPayInfoApply (Request $request){
        $id = $request['id'];
        $coop = CoopUser::find($id);
        if ($coop && $coop->deletion_date === null) {
            $coop->update([
                'pay_status' => $request['pay_status'],
                'amount_of_compensation' => $request['pay']
            ]);
            return redirect()->route('admin.adminViewCoopPayInfo', ['id' => $id]);
        }
        return redirect()->route('admin.adminViewCoopPayInfo');
    }
}
