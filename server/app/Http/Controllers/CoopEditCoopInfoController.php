<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopUser;
use App\Models\CoopLocation;
use App\Models\LicenseInformation;
use App\Models\AccountInformation;
use App\Models\MstPrefecture;
use App\Models\Cities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoopEditCoopInfoController extends Controller
{
    public function coopEditCoopInfo (){
        $A = 'coops';
        $userId = Auth::guard($A)->id();
        $coop = CoopUser::where('id', $userId)->where('deletion_date', null)->first();
        if ($coop && $coop->deletion_date == null) {
            $CoopLocation = CoopLocation::where('coop_user_id', $userId)->where('deletion_date', null)->first();
            $LicenseInformation = LicenseInformation::where("id",$coop->license_information_id)->first();
            $AccountInformation = AccountInformation::where("id",$coop->account_information_id)->first();
            $Prefecture = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();
            $cityCollection = Cities::orderBy('id')->select('id', 'prefecture_id', 'name')->get();
            $Cities = $cityCollection->groupBy('prefecture_id')->map(function ($items) {
                return $items->pluck('name', 'id')->toArray();
            })->toArray();
            $Cities[0] = $CoopLocation->city_id;
            $coop->password = null;
            return view('coop.CoopEditCoopInfo', compact('coop',"CoopLocation","LicenseInformation","AccountInformation", 'Prefecture', 'Cities'));
        }
        return redirect()->route('coop.coopLogin');
    }
    public function editCoopInfo (Request $request){
        $A = 'coops';
        $userId = Auth::guard($A)->id();
        $coop = CoopUser::where('id', $userId)->where('deletion_date', null)->first();
        $request->merge([
            'application_status' => 0,
            'child_status' => 0,
            'pair_id' => 0,
            'pay_status' => 0,
            'amount_of_compensation' => 0,
        ]);
        try {
            DB::beginTransaction();
            $license_information = $request->validate([
                'date_of_issue' => 'required|date',
                'date_of_registration' => 'required|date',
                'name' => 'required|string',
                'birth' => 'required|date',
                'conditions' => 'required|string',
                'classification' => 'required|string',
                'ratings_and_limitations1' => 'required|string',
                'ratings_and_limitations2' => 'nullable|string',
                'ratings_and_limitations3' => 'nullable|string',
                'number' => 'required|string',
            ]);
            $licenseInformationTable = LicenseInformation::findOrFail($coop["license_information_id"]);
            $licenseInformationTable->update($license_information);
            $data = $request->validate([
                'bank_id' => 'required|string',
                'branch_id' => 'required|string',
                'account_type' => 'required|string',
                'account_number' => 'required|string',
                'account_name' => 'required|string',
                'account_name_kana' => 'required|string',
            ]);
            $AccountInformationTable = AccountInformation::findOrFail($coop->account_information_id);
            $AccountInformationTable->update($data);
            $request->merge([
                'license_information_id' => $coop->license_information_id,
                'account_information_id' => $coop->account_information_id,
            ]);
            $request->merge([
                'application_status' => 0,
                'child_status' => 0,
                'pair_id' => null,
                'pay_status' => 0,
                'amount_of_compensation' => 0,
            ]);
            $coopdata = $request->validate([
                'email_address' => 'required|email',
                'coop_name' => 'required|string',
                'representative_last_name' => 'required|string',
                'representative_first_name' => 'required|string',
                'representative_last_name_kana' => 'required|string',
                'representative_first_name_kana' => 'required|string',
                'license_information_id' => 'required|integer',
                'account_information_id' => 'required|integer',
                'employees' => 'required|integer',
                'phone_number' => 'required|string',
                'land_or_air' => 'required|string',
                'application_status' => 'required|integer',
                'child_status' => 'required|integer',
                'pay_status' => 'required|integer',
                'amount_of_compensation' => 'required|integer',
            ]);
            
            // パスワードが入力されている場合のみ更新
            if ($request->filled('password')) {
                // パスワードのバリデーション
                $passwordRules = [
                    'password' => 'required|min:8',
                ];
            
                $this->validate($request, $passwordRules);
            
                // パスワードをデータに追加
                $coopdata['password'] = bcrypt($request->input('password'));
            }
            $CoopUserTable = CoopUser::findOrFail($coop->account_information_id);
            $CoopUserTable->update($coopdata);
            $request->merge([
                'license_holder_name' => $coop->name,
                'license_id' => $coop->license_id,
                'coop_user_id' => $coop->id,
            ]);
            $coopLocation = $request->validate([
                'office_name' => 'required|string|max:100',
                'postal_code' => 'required|integer',
                'prefecture_id' => 'required|integer',
                'city_id' => 'required|integer',
                // 'license_holder_name' => 'required|string|max:100',
                // 'license_id' => 'required|integer',
                'town' => 'nullable|string|max:100',
                'block' => 'nullable|string|max:100',
                'coop_user_id' => 'nullable|integer|exists:coop_user,id',
            ]);
            $CoopLocationTable = CoopLocation::where('coop_user_id','=',$coop->id);
            $CoopLocationTable->update($coopLocation);
            DB::commit();
            return redirect()->route('coop.coopEditCoopInfo')->with('success', '企業情報が更新されました。');
        }catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            DB::rollback();
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
