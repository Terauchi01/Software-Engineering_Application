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
    public function coopEditCoopInfo ($id){
        $A = 'coops';
        $userId = Auth::guard($A)->id();
        $coop = CoopUser::findOrFail($userId);
        $CoopLocation = CoopLocation::where("deletion_date","=",null)->where("id","=",$id)->where("user_id","=",$userId);
        $LicenseInformation = LicenseInformation::where();
        $AccountInformation = AccountInformation::where();
        $Prefecture = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();
        $cityCollection = Cities::orderBy('id')->select('id', 'prefecture_id', 'name')->get();
        $Cities = $cityCollection->groupBy('prefecture_id')->map(function ($items) {
            return $items->pluck('name', 'id')->toArray();
        })->toArray();
        return view('coop.CoopEditCoopInfo', compact('coop', 'Prefecture', 'Cities'));
    }
    public function editCoopInfo (){
        return view('coop.CoopEditCoopInfo');
    }
}
