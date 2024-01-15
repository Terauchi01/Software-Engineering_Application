<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoopUser;
use App\Models\LicenseInformation;
use App\Models\AccountInformation;

class CoopRegistrationRequestController extends Controller
{
    // 事業者登録申請
    public function coopApplyCoopRegister (){
        //viewの返すところは適当で良い
        return view('coop.CoopRegistrationRequest');
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
            // dd($license_information);
            $document = LicenseInformation::create($license_information);
            $licenseId = $document->id;

            $data = $request->validate([
                'bank_id' => 'required|integer',
                'branch_id' => 'required|string',
                'account_type' => 'required|string',
                'account_number' => 'required|string',
                'account_name' => 'required|string',
                'account_name_kana' => 'required|string',
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
                'email_address' => 'required|email|unique:coop_user,email_address',
                'password' => 'required|min:8', // パスワードの最小長は8と仮定
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
            CoopUser::create($coopdata);

            return redirect()->route('coop.coopApplyCoopRegister')->with('success', '企業情報が登録されました。');

        }catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
        
    }
}