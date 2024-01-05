<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPrefecture;
use App\Models\DeliveryRequest;
use App\Models\User;

class AdminViewUserStatisticsInfoController extends Controller
{
    public function adminViewUserStatisticsInfo (){
        //累計配達個数
        $count = DeliveryRequest::select('delivery_destination_id', 'user_id')
            ->where('delivery_status', '=', 4)
            ->count();
        // データ表示
        // dump($count);
        
        $Prefecture = MstPrefecture::all();
        // $User = $Prefecture;
        
        //都道府県id別配達個数
        $A = DeliveryRequest::select('delivery_destination_id', 'user_id')
            ->where('delivery_status', '=', 4)
            ->get();
        
        $users = User::select('id', 'prefecture_id')->get();
        
        $fromCounts = [];
        $toCounts = [];
        
        foreach ($A as $request) {
            $fromPrefectureId = $users->where('id', $request->user_id)->pluck('prefecture_id')->first();
            $toPrefectureId = $users->where('id', $request->delivery_destination_id)->pluck('prefecture_id')->first();
            
            // 出発地からのデータ数をカウント
            if (!isset($fromCounts[$fromPrefectureId])) {
                $fromCounts[$fromPrefectureId] = 1;
            } else {
                $fromCounts[$fromPrefectureId]++;
            }
            
            // 到着地へのデータ数をカウント
            if (!isset($toCounts[$toPrefectureId])) {
                $toCounts[$toPrefectureId] = 1;
            } else {
                $toCounts[$toPrefectureId]++;
            }
        }
        // データ表示
        ksort($fromCounts);
        ksort($toCounts);
        // dump($Prefecture);
        // dump($fromCounts);
        // dump($toCounts);
        
        return view('admin.AdminViewUserStatisticsInfo', compact('count', 'Prefecture', 'fromCounts', 'toCounts'));
    }
    public function adminViewUserStatisticsInfoGraph (){
        //累計配達個数
        $count = DeliveryRequest::select('delivery_destination_id', 'user_id')
            ->where('delivery_status', '=', 4)
            ->count();
        // データ表示
        // dump($count);
        
        $Prefecture = MstPrefecture::all();
        // $User = $Prefecture;
        
        //都道府県id別配達個数
        $A = DeliveryRequest::select('delivery_destination_id', 'user_id')
            ->where('delivery_status', '=', 4)
            ->get();
        
        $users = User::select('id', 'prefecture_id')->get();
        
        $fromPrefectures = [];
        $toPrefectures = [];
        $fromCounts = [];
        $toCounts = [];
        
        foreach ($A as $request) {
            $fromPrefectureId = $users->where('id', $request->user_id)->pluck('prefecture_id')->first();
            $toPrefectureId = $users->where('id', $request->delivery_destination_id)->pluck('prefecture_id')->first();
            
            // 出発地からのデータ数をカウント
            if (!isset($fromCounts[$fromPrefectureId])) {
                $fromCounts[$fromPrefectureId] = 1;
                $fromPrefectures[$fromPrefectureId] = $Prefecture->where('id', $fromPrefectureId)->pluck('name')->first();
            } else {
                $fromCounts[$fromPrefectureId]++;
            }
            
            // 到着地へのデータ数をカウント
            if (!isset($toCounts[$toPrefectureId])) {
                $toPrefectures[$toPrefectureId] = $Prefecture->where('id', $toPrefectureId)->pluck('name')->first();
                $toCounts[$toPrefectureId] = 1;
            } else {
                $toCounts[$toPrefectureId]++;
            }
        }
        // データ表示
        ksort($fromCounts);
        ksort($toCounts);
        // dump($Prefecture);
        // dump($fromCounts);
        // dump($toCounts);
        
        ksort($fromPrefectures);
        ksort($toPrefectures);
        $fromPrefectures = array_values($fromPrefectures);
        $toPrefectures = array_values($toPrefectures);
        $fromCounts = array_values($fromCounts);
        $toCounts = array_values($toCounts);
        
        return view('admin.AdminViewUserStatisticsInfoGraph', compact('fromPrefectures', 'toPrefectures', 'fromCounts', 'toCounts'));
    }
}
