<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
// id
// coop_name
// representative_name
// coop_locations_list_id
// land_or_air
