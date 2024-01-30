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
use Illuminate\Validation\Rule;

class CoopRegistrationRequestController extends Controller
{
    // 事業者登録申請
    public function coopApplyCoopRegister (){
        // 都道府県をidでソートして取得
        $Prefecture = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();

        // 市区町村をidでソートして取得
        $cityCollection = Cities::orderBy('id')->select('id', 'prefecture_id', 'name')->get();
        // コレクションをprefecture_idをキーにした連想配列に変換
        $Cities = $cityCollection->groupBy('prefecture_id')->map(function ($items) {
            return $items->pluck('name', 'id')->toArray();
        })->toArray();
        return view('coop.CoopRegistrationRequest',compact('Prefecture','Cities'));
    }
    public function coopRegister(Request $request)
    {
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
                'date_of_issue' => 'required|date|after_or_equal:2022-01-01|before_or_equal:today',
                'date_of_registration' => 'required|date|after_or_equal:2022-01-01|before_or_equal:today',
                'name' => 'required|string|max:100',
                'birth' => 'required|date|after_or_equal:1900-01-01|before_or_equal:today',
                'conditions' => 'nullable|string|max:100',
                'classification' => 'required|string|max:100',
                'ratings_and_limitations1' => 'nullable|string|max:100',
                'ratings_and_limitations2' => 'nullable|string|max:100',
                'ratings_and_limitations3' => 'nullable|string|max:100',
                'number' => 'nullable|string|max:200',
            ]);
            // dd($license_information);
            $document = LicenseInformation::create($license_information);
            $licenseId = $document->id;

            $data = $request->validate([
                'bank_id' => 'required|numeric',
                'branch_id' => 'required|numeric',
                'account_type' => 'required|string|max:100',
                'account_number' => 'required|string|max:255',
                'account_name' => 'required|string|max:100',
                'account_name_kana' => 'required|string|max:255',
            ]);
            $bankAccount = AccountInformation::create($data);
            // 登録したIDを取得
            $bankAccountId = $bankAccount->id;

            $request->merge([
                'license_information_id' => $licenseId,
                'account_information_id' => $bankAccountId,
            ]);
            $request->merge([
                'application_status' => 0,
                'child_status' => 0,
                'pair_id' => null,
                'pay_status' => 0,
                'amount_of_compensation' => 0,
            ]);
            $coopdata = $request->validate([
                'email_address' => [
                    'required',
                    'email',
                    'max:100',
                    Rule::unique('user', 'email_address')->whereNull('deletion_date'),
                ],
                'password' => 'required|min:8',
                'coop_name' => 'required|string',
                'representative_last_name' => 'required|string',
                'representative_first_name' => 'required|string',
                'representative_last_name_kana' => 'required|string',
                'representative_first_name_kana' => 'required|string',
                'license_information_id' => 'required|integer',
                'account_information_id' => 'required|integer',
                'employees' => 'required|integer|min:1',
                'phone_number' => 'required|string',
                'land_or_air' => 'required|string',
                'application_status' => 'required|integer',
                'child_status' => 'required|integer',
                'pay_status' => 'required|integer',
                'amount_of_compensation' => 'required|integer',
            ]);
            $coop = CoopUser::create($coopdata);
            $request->merge([
                'coop_user_id' => $coop->id,
                'license_holder_name' => $document->name,
                'license_id' => $licenseId,
            ]);

            $coopLocation = $request->validate([
                'office_name' => 'required|string|max:100',
                'postal_code' => 'required|integer',
                'prefecture_id' => 'required|integer',
                'city_id' => 'required|integer',
                'license_holder_name' => 'required|string|max:100',
                'license_id' => 'required|integer',
                'town' => 'nullable|string|max:100',
                'block' => 'nullable|string|max:100',
                'coop_user_id' => 'nullable|integer|exists:coop_user,id',
            ]);
            // dd($coopLocation);
            CoopLocation::create($coopLocation);
            DB::commit();


            return redirect()->route('coop.coopApplyCoopRegister')->with('success', '企業情報が登録されました。');

        }catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            DB::rollback();
            return back()->withErrors($e->validator)->withInput();
        }
        
    }
}