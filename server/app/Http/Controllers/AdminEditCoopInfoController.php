<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopUser;
use App\Models\CoopLocation;
use App\Models\AccountInformation;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\LicenseInformation;

class AdminEditCoopInfoController extends Controller
{
    public function adminEditCoopInfo (Request $request){
        $id = $request->input('id');
        $coop = CoopUser::find($id);

        if ($coop && $coop->deletion_date === null) {
            $acc = AccountInformation::find($coop->account_information_id);
            $loc = CoopLocation::where('coop_user_id', $id)->first();
            $license = LicenseInformation::find($coop->license_information_id);
            $coopId = $coop->id;
            $coopName = $coop->coop_name;
            $data = [
                'coop_name' => $coopName,
                'email' => $coop->email_address,
                'password' => '**********',
                'last_name' => $coop->representative_last_name,
                'first_name' => $coop->representative_first_name,
                'last_name_kana' => $coop->representative_last_name_kana,
                'first_name_kana' => $coop->representative_first_name_kana,
                'postal_code' => $loc->postal_code,
                'prefecture' => MstPrefecture::find($loc->prefecture_id)['name'],
                'city' => Cities::find($loc->city_id)['name'],
                'town' => $loc->town,
                'block' => $loc->block,
                'date_of_issue' => $license->date_of_issue,
                'date_of_registration' => $license->date_of_registration,
                'name' => $license->name,
                'birth' => $license->birth,
                'conditions' => $license->conditions,
                'classification' => $license->classification,
                'ratings_and_limitations1' => $license->ratings_and_limitations1,
                'ratings_and_limitations2' => $license->ratings_and_limitations2,
                'ratings_and_limitations3' => $license->ratings_and_limitations3,
                'acc_bank' => $acc->bank_id,
                'acc_branch' => $acc->branch_id,
                'acc_type' => $acc->account_type,
                'acc_num' => $acc->account_number,
                'worker' => $coop->employees,
                'phone' => $coop->phone_number,
                'land_or_air' => $coop->land_or_air,
                'status' => $coop->application_status
            ];
            return view('admin.AdminEditCoopInfo', compact('coopName', 'coopId', 'data'));
        }
        
        $coopName = '存在しないユーザです';
        $coopId = null;
        return view('admin.AdminEditCoopInfo', compact('coopName', 'coopId'));
    }
    
    public function adminEditCoopInfoApply (Request $request){
        $id = $request->input('id');
        $coop = CoopUser::find($id);

        if ($coop && $coop->deletion_date === null) {
            if ($request['password'] === null) $password = $coop['password'];
            else $password = $request['password'];
            $coop->update([
                'email_address' => $request['email'],
                'password' => $password,
                'coop_name' => $request['coop_name'],
                'representative_last_name' => $request['last_name'],
                'representative_first_name' => $request['first_name'],
                'representative_last_name_kana' => $request['last_name_kana'],
                'representative_first_name_kana' => $request['first_name_kana'],
                'employees' => $request['employees'],
                'phone_number' => $request['phone_number'],
                'land_or_air' => $request['land_or_air'],
                'application_status' => $request['application_status']
            ]);
            $clData = CoopLocation::where('coop_user_id', $id);
            $clData->update([
                'postal_code' => $request['postal_code'],
                'prefecture_id' => MstPrefecture::where('name', $request['prefecture'])->value('id'),
                'city_id' => Cities::where('name', $request['city'])->value('id'),
                'town' => $request['town'],
                'block' => $request['block']
            ]);
            $liData = LicenseInformation::find($coop->license_information_id);
            $liData->update([
                'date_of_issue' => $request['date_of_issue'],
                'date_of_registration' => $request['date_of_registration'],
                'name' => $request['name'],
                'birth' => $request['birth'],
                'conditions' => $request['conditions'],
                'classification' => $request['classification'],
                'ratings_and_limitations1' => $request['ratings_and_limitations1'],
                'ratings_and_limitations2' => $request['ratings_and_limitations2'],
                'ratings_and_limitations3' => $request['ratings_and_limitations3']
            ]);
            $aData = AccountInformation::find($coop->account_information_id);
            $aData->update([
                'bank_id' => $request['bank_id'],
                'branch_id' => $request['branch_id'],
                'account_type' => $request['account_type'],
                'account_number' => $request['account_number']
            ]);
            return redirect()->route('admin.adminViewCoopInfo', ['id' => $id]);
        }
        return redirect()->route('admin.adminViewCoopInfo');
    }
}
