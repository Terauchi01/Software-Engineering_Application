<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPrefecture;
use App\Models\Cities;
//事業者一覧

class AdminViewCoopListController extends Controller
{
    public function adminViewCoopList (){
        //viewの返すところは適当で良い
        $id = ['1', '2', '3'];
        $coop_name = ['土佐山田配送', '高知配送', '南国配送'];
        $representative_name = ['山田太郎', '高知花子', '南国次郎'];
        $coop_locations_list_id = ['土佐山田', '高知', '南国'];
        $pay_status = ['済', '済', '未'];
        $land_or_air = ['1', '0', '1'];
        return view('admin.AdminViewCoopList', compact('id', 'coop_name', 'representative_name', 'coop_locations_list_id', 'pay_status', 'land_or_air'));
    }

    public function delete(Request $request, $coopId)
    {
        // $coopId を使用して削除などの処理を行う
        Model::destroy($coopId);
        // レスポンスを返す（任意のメッセージを含める）
        dd($coopId);
        return response()->json(['message' => '削除が完了しました。']);
       
    }
}
// id
// coop_name
// representative_name
// coop_locations_list_id
// land_or_air
