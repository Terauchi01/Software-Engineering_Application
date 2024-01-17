<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DeliveryRequest;
use App\Models\DeliveryLocationImage;
use Carbon\Carbon;

class UserWithdrawController extends Controller
{
    public function userWithdraw (){
        //viewの返すところは適当で良い
        return view('user.UserWithdraw');
    }
    public function withdraw (){
        $A = 'users';
        $userId = Auth::guard($A)->id();
        $exists = DeliveryRequest::where(function ($query) use ($userId) {
            $query->where('delivery_destination_id', $userId)
                  ->orWhere('user_id', $userId);
        })->where('delivery_status', '!=', 4)->where('unpaid_charge','=','0')->exists();
        // $exists = false;
        if($exists){
            return redirect()->back()->with('error', '配達中の荷物が存在します');
        }
        else{
            $user = User::where('id',$userId)->get();
            User::where('id',$userId)->update(
                [
                    'deletion_date' => now(),
                ]
            );
            DeliveryLocationImage::where('user_id',$userId)->update(
                [
                    'deletion_date' => now(),
                ]
            );
            Auth::guard('users')->logout();
        }
        return redirect()->route('user.userLogin');
    }
}