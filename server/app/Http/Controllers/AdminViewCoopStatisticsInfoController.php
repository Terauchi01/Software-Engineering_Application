<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CoopDrones;
use App\Models\CoopUser;
use App\Models\DeliveryRequest;
use Illuminate\Support\Facades\DB;

class AdminViewCoopStatisticsInfoController extends Controller
{
    public function adminViewCoopStatisticsInfo (){
        //1か月の配達個数×3社
        $oneMonthAgo = Carbon::now()->subMonth();
        $A = DeliveryRequest::select('collection_company_id','intermediate_delivery_company_id','delivery_company_id','delivery_status','delivery_date','updated_at')->where('delivery_status','==',4)->where('updated_at', '>=', $oneMonthAgo)->get();
        $coop = CoopUser::select('id','coop_name')->get();
        $name = [];
        $month_collection = [];
        $month_intermediate = [];
        $month_delivery = [];
        foreach ($coop as $user) {
            $userId = $user->id;
            $name[$userId] = $user->coop_name;
            $month_collection[$userId] = $A->where('collection_company_id', $userId)->count();
            $month_intermediate[$userId] = $A->where('intermediate_delivery_company_id', $userId)->count();
            $month_delivery[$userId] = $A->where('delivery_company_id', $userId)->count();
            
        }
        
        // データ表示
        // dump($name);
        // dump($month_collection);
        // dump($month_intermediate);
        // dump($month_delivery);
        
        //事業者のドローン稼働率
        $A = CoopDrones::select('coop_user_id', 'drone_status', DB::raw('COUNT(*) as count'))
            ->groupBy('coop_user_id', 'drone_status')
            ->get();
        $coop = CoopUser::select('id','coop_name')->get();
        $name = [];
        $ratio = [];
        foreach ($coop as $user) {
            $userId = $user->id;
            $name[$userId] = $user->coop_name;
            
            $countStatus1 = $A->where('coop_user_id', $userId)->where('drone_status', 1)->first();
            $countStatus0 = $A->where('coop_user_id', $userId)->where('drone_status', 0)->first();
            $status1Count = $countStatus1 ? $countStatus1->count : 0;
            $status0Count = $countStatus0 ? $countStatus0->count : 0;
            if ($status1Count + $status0Count === 0) {
                $ratio[$userId] = -1;
            } else {
                $ratio[$userId] = ($status1Count / ($status1Count + $status0Count));
            }
        }
        // データ表示
        // dump($name);
        // dump($ratio);
        
        return view('admin.adminViewCoopStatisticsInfo', compact('name', 'month_delivery', 'ratio'));
    }
    public function adminViewCoopStatisticsInfoGraph (){
        //1か月の配達個数×3社
        $oneMonthAgo = Carbon::now()->subMonth();
        $A = DeliveryRequest::select('collection_company_id','intermediate_delivery_company_id','delivery_company_id','delivery_status','delivery_date','updated_at')->where('delivery_status','==',4)->where('updated_at', '>=', $oneMonthAgo)->get();
        $coop = CoopUser::select('id','coop_name')->get();
        $name = [];
        $month_collection = [];
        $month_intermediate = [];
        $month_delivery = [];
        foreach ($coop as $user) {
            $userId = $user->id;
            $name[$userId] = $user->coop_name;
            $month_collection[$userId] = $A->where('collection_company_id', $userId)->count();
            $month_intermediate[$userId] = $A->where('intermediate_delivery_company_id', $userId)->count();
            $month_delivery[$userId] = $A->where('delivery_company_id', $userId)->count();
        }
        
        // データ表示
        // dump($name);
        // dump($month_collection);
        // dump($month_intermediate);
        // dump($month_delivery);
        
        //事業者のドローン稼働率
        $A = CoopDrones::select('coop_user_id', 'drone_status', DB::raw('COUNT(*) as count'))
            ->groupBy('coop_user_id', 'drone_status')
            ->get();
        $coop = CoopUser::select('id','coop_name')->get();
        $name2 = [];
        $ratio = [];
        foreach ($coop as $user) {
            $userId = $user->id;
            
            $countStatus1 = $A->where('coop_user_id', $userId)->where('drone_status', 1)->first();
            $countStatus0 = $A->where('coop_user_id', $userId)->where('drone_status', 0)->first();
            $status1Count = $countStatus1 ? $countStatus1->count : 0;
            $status0Count = $countStatus0 ? $countStatus0->count : 0;
            if ($status1Count + $status0Count === 0) {
                //$ratio[$userId] = -1;
            } else {
                $name2[$userId] = $user->coop_name;
                $ratio[$userId] = ($status1Count / ($status1Count + $status0Count));
            }
        }
        // データ表示
        // dump($name);
        // dump($ratio);
        
        $name = array_values($name);
        $name2 = array_values($name2);
        $month_delivery = array_values($month_delivery);
        $ratio = array_values($ratio);
        
        return view('admin.adminViewCoopStatisticsInfoGraph', compact('name', 'month_delivery', 'name2', 'ratio'));
    }
}