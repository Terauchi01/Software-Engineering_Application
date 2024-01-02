<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountInformation;
use App\Models\AdminInformation;
use App\Models\AdminUser;
use App\Models\ChildAccount;
use App\Models\CoopDrones;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use App\Models\DeliveryLocationImage;
use App\Models\DeliveryRequest;
use App\Models\DroneType;
use App\Models\Favorite;
use App\Models\LicenseInformation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\MstPrefecture;
use App\Models\Cities;

class HelloController extends Controller
{
    public function index () 
    {
        $AccountInformation = AccountInformation::all();
        $AdminInformation = AdminInformation::all();
        $AdminUser = AdminUser::all();
        $CoopDrones = CoopDrones::all();
        $CoopLocation = CoopLocation::all();
        $CoopUser = CoopUser::all();
        $DeliveryLocationImage = DeliveryLocationImage::all();
        $DeliveryRequest = DeliveryRequest::all();
        $DroneType = DroneType::all();
        $Favorite = Favorite::all();
        $LicenseInformation = LicenseInformation::all();
        $User = User::all();
        $Prefecture = MstPrefecture::all();
        // $Cities = Cities::all();
        $Cities = Cities::select('prefecture_id','name')->where('prefecture_id','=','1')->get();
        $User = $CoopLocation;

        //事業者一覧
        $list = CoopUser::select('id','coop_name','representative_last_name','representative_first_name','pay_status','child_status','pair_id')->get();
        $location = CoopLocation::select('coop_user_id','postal_code','prefecture_id','city_id','town','block')->get();
        $mergedData = $list->map(function ($item) use ($location) {
            $locationData = $location->where('coop_user_id', $item->id)->first();
        
            return [
                'id' => $item->id,
                'coop_name' => $item->coop_name,
                'representative_last_name' => $item->representative_last_name,
                'representative_first_name' => $item->representative_first_name,
                'pay_status' => $item->pay_status,
                'child_status' => $item->child_status,
                'pair_id' => $item->pair_id,
                'postal_code' => optional($locationData)->postal_code,
                'prefecture_id' => optional($locationData)->prefecture_id,
                'city_id' => optional($locationData)->city_id,
                'town_id' => optional($locationData)->town_id,
                'block_id' => optional($locationData)->block_id,
            ];
        });
        
        // 結合したデータを表示（デバッグ用）
        dump($mergedData);
        // dump($Cities);

        return view('index', compact('AccountInformation','AdminInformation','AdminUser','CoopDrones','CoopLocation','CoopUser','DeliveryLocationImage','DeliveryRequest','DroneType','Favorite','LicenseInformation','User'));
    }
    public function send_date (){
        return view('send_date');
    }
    public function update_controller(Request $request){
        $name = $request->message;
        $User = User::find(1);
        $User->update(["name" => $name,"email" => "test@gmail.com","password" => password_hash("test", PASSWORD_DEFAULT)]);
        return view('index', compact('User'));
    }
    public function insert_controller(){
        $user = new User;
        $user->name = 'terauchishunsuke2';
        $user->email = '250348@gmail.com';
        $user->password = '12345';
        $user->save();


        $User = User::where("name",'terauchishunsuke2')->first();
        return view('index', compact('User'));
    }
}
