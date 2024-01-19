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

class CoopEditChildCoopAccountController extends Controller
{
    // public function coopEditChildCoopAccount ($id){
    //     $A = 'coops';
    //     $userId = Auth::guard($A)->id();
    //     $coop = CoopUser::findOrFail($userId);
    //     $CoopLocationId = $id;
    //     $CoopLocation = CoopLocation::where("deletion_date","=",null)->where("id","=",$CoopLocationId)->where("user_id","=",$userId);
    //     $LicenseInformation = LicenseInformation::findOrFail($coop->license_information_id);
    //     $AccountInformation = AccountInformation::findOrFail($coop->accountInformation_id);
    //     $Prefecture = MstPrefecture::orderBy('id')->pluck('name', 'id')->toArray();
    //     $cityCollection = Cities::orderBy('id')->select('id', 'prefecture_id', 'name')->get();
    //     $Cities = $cityCollection->groupBy('prefecture_id')->map(function ($items) {
    //         return $items->pluck('name', 'id')->toArray();
    //     })->toArray();
    //     $Cities[0] = $CoopLocation->city_id;
    //     return view('coop.editCoopRegistrationRequest', compact('coop', 'Prefecture', 'Cities'));
    // }
    // public function editChildAccount (){
    //     return view('coop.CoopEditChildCoopAccount');
    // }
}
