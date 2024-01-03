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
        $Cities = Cities::all();

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
