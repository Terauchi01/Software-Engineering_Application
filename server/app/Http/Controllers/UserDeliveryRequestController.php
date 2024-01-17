<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliveryRequest;
use App\Models\User;
use App\Models\CoopUser;
use App\Models\MstPrefecture;
use App\Models\Cities;

class UserDeliveryRequestController extends Controller
{
    public function userDeliveryRequest (){
        // 都道府県をidでソートして取得
        $Prefecture = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();

        // 市区町村をidでソートして取得
        $cityCollection = Cities::orderBy('id')->select('id', 'prefecture_id', 'name')->get();
        // コレクションをprefecture_idをキーにした連想配列に変換
        $Cities = $cityCollection->groupBy('prefecture_id')->map(function ($items) {
            return $items->pluck('name', 'id')->toArray();
        })->toArray();
        return view('user.UserDeliveryRequest',compact('Prefecture','Cities'));
    }
    public function deliveryRequest (Request $request){
        $userId = Auth::guard('users')->id();
        $request->merge([
            'user_id' => $userId,
            'collection_company_id' => null,
            'intermediate_delivery_company_id' => null,
            'delivery_company_id' => null,
            'collection_company_remuneration' => 0,
            'intermediate_delivery_company_remuneration' => 0,
            'delivery_company_remuneration' => 0,
            'delivery_status' => 0,
            'delivery_date' => null,
        ]);
        $user = User::where('user_last_name', $request->input('user_last_name'))
            ->where('user_first_name', $request->input('user_first_name'))
            ->where('user_last_name_kana', $request->input('user_last_name_kana'))
            ->where('user_first_name_kana', $request->input('user_first_name_kana'))
            ->where('postal_code', $request->input('postal_code'))
            ->where('prefecture_id', $request->input('prefecture_id'))
            ->where('city_id', $request->input('city_id'))
            ->where('town', $request->input('town'))
            ->where('block', $request->input('block'))
            ->first();

        if ($user) {
            $userId = $user->id;
            $request->merge([
                'delivery_destination_id' => $userId,
            ]);
            // ここで取得した $userId を使って何か処理を行う
        } else {
            // データが見つからなかった場合の処理
        }

        try {
            $request->validate([
                'delivery_destination_id' => 'required',
                'user_id' => 'required',
                'collection_company_id' => 'nullable',
                'intermediate_delivery_company_id' => 'nullable',
                'delivery_company_id' => 'nullable',
                'collection_company_remuneration' => 'required',
                'intermediate_delivery_company_remuneration' => 'required',
                'delivery_company_remuneration' => 'required',
                'item' => 'required',
                'delivery_status' => 'required',
                'request_date' => 'required|date',
                'delivery_date' => 'nullable|date',
            ]);
    
            // データをデータベースに保存
            DeliveryRequest::create($request->all());
    
            return redirect()->route('user.userDeliveryRequest')->with('success', '配送が登録されました。');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // バリデーションエラーが発生した場合
            return back()->withErrors($e->validator)->withInput();
        }
    }
}
