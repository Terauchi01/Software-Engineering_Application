<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CoopChildAccountListController extends Controller
{
    public function coopFilterChildCoopAccountListView (){
        return view('coop.CoopChildAccountList');
    }
    public function coopSearchChildCoopAccountListView (){
        return view('coop.CoopChildAccountList');
    }
    public function coopSortChildCoopAccountListViewInfo (){
        return view('coop.CoopChildAccountList');
    }
    public function coopAllSelectChild (){
        return view('coop.CoopChildAccountList');
    }
    public function coopAllExecuteChildCoopAccountListView (){
        return view('coop.CoopChildAccountList');
    }
    public function coopViewChildCoopAccountList (){
        $CoopLocation = CoopLocation::all();
        $list = CoopUser::select(
            'coop_user.id',
            'coop_user.email_address',
            'coop_user.password',
            'coop_user.coop_name',
            'coop_user.representative_last_name',
            'coop_user.representative_first_name',
            'coop_user.pay_status',
            'coop_user.child_status',
            'coop_user.pair_id',
            'coop_user.deletion_date',
            'coop_location.postal_code',
            'coop_location.prefecture_id',
            'coop_location.city_id',
            'coop_location.town',
            'coop_location.block'
        )
              ->where('coop_user.deletion_date', '=', null)
              ->where('coop_location.deletion_date', '=', null)
              ->where('coop_user.child_status', '=', 0) // 1←子アカウントを選択
              ->join('coop_location', 'coop_user.id', '=', 'coop_location.coop_user_id')
              ->orderBy('coop_user.id', 'asc') 
              ->get();
        $Prefecture_list = MstPrefecture::pluck('name', 'id')->toArray();
        $Cities_list = Cities::pluck('name', 'id')->toArray();
        $mergedData = [];
        $A=['未','済'];
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'coop_name' => $item->coop_name,
                'email_address' => $item->email_address,
                'child_status' => $item->child_status,
            ];
        }   
        return view('coop.CoopChildAccountList', compact('mergedData'));
    }
    public function coopDeleteChildCoopAccount (){
        return view('coop.CoopChildAccountList');
    }
}
