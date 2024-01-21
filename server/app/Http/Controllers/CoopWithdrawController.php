<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CoopUser;
use App\Models\DeliveryRequest;
use Carbon\Carbon;

class CoopWithdrawController extends Controller
{
    public function coopWithdraw (){
        return view('coop.CoopWithdraw');
    }
    public function withdraw (){
        $A = 'coops';
        $userId = Auth::guard($A)->id();
        $exists = DeliveryRequest::where(function ($query) use ($userId) {
            $query->where('collection_company_id', $userId)
                  ->orWhere('intermediate_delivery_company_id', $userId)
                  ->orWhere('delivery_company_id', $userId);
        })->where('delivery_status', '!=', 4)->exists();
        $user_pay = CoopUser::where('amount_of_compensation','=',0)->exists();
        
        if($exists){
            return redirect()->back()->with('error', '配達中の荷物が存在します');
        }
        else{
            if($user_pay){
                return redirect()->back()->with('error', '未払いの料金が発生します');
            }
            CoopUser::where('id',$userId)->update(
                [
                    'deletion_date' => now(),
                ]
            );
            CoopUser::where('pair_id',$userId)->update(
                [
                    'deletion_date' => now(),
                ]
            );
            Auth::guard('users')->logout();
        }
        return redirect()->route('coop.coopLogin');
    }
}
