<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MstPrefecture;
use App\Models\DeliveryRequest;
use App\Models\User;

class AdminViewUserStatisticsInfoController extends Controller
{
    public function adminViewUserStatisticsInfo (){
        //6ヶ月分の累計配達個数
        $sum = 0;
        $sixMonthsAgoFirstDays = [];
        for ($i = 0; $i < 6; $i++) {
            $sixMonthsAgoFirstDays[] = Carbon::now()->subMonths($i)->startOfMonth();
            $monthCounts[] = DeliveryRequest::where('deletion_date','=',null)->where('delivery_status', 4)->where('updated_at', '>=', $sixMonthsAgoFirstDays[$i])->count()-$sum;
            $sum += $monthCounts[$i];
        }
        // dump($monthCounts);
        
        $Prefecture = MstPrefecture::all();
        // $User = $Prefecture;
        
        //都道府県id別配達個数
        $A = DeliveryRequest::where('deletion_date','=',null)
            ->select('delivery_destination_id', 'user_id')
            ->where('delivery_status', '=', 4)
            ->get();
        
        $users = User::where('deletion_date','=',null)->select('id', 'prefecture_id')->get();
        
        $fromCounts = [];
        $toCounts = [];
        
        foreach ($A as $request) {
            $fromPrefectureId = $users->where('deletion_date','=',null)->where('id', $request->user_id)->pluck('prefecture_id')->first();
            $toPrefectureId = $users->where('deletion_date','=',null)->where('id', $request->delivery_destination_id)->pluck('prefecture_id')->first();
            
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
        
        return view('admin.AdminViewUserStatisticsInfo', compact('sum', 'Prefecture', 'fromCounts', 'toCounts'));
    }
    public function adminViewUserStatisticsInfoGraph (){
        //6ヶ月分の累計配達個数
        $sum = 0;
        $sixMonthsAgoFirstDays = [];
        for ($i = 0; $i < 6; $i++) {
            $sixMonthsAgoFirstDays[] = Carbon::now()->subMonths($i)->startOfMonth();
            $monthCounts[] = DeliveryRequest::where('deletion_date','=',null)->where('delivery_status', 4)->where('updated_at', '>=', $sixMonthsAgoFirstDays[$i])->count()-$sum;
            $sum += $monthCounts[$i];
        }
        $monthCounts = array_reverse($monthCounts);
        // dump($monthCounts);
        $month = [];
        for ($i = 0; $i < 6; $i++) {
            $month[$i] = $sixMonthsAgoFirstDays[$i]->month;
        }
        $month = array_reverse($month);
        // dump($month);
        
        $Prefecture = MstPrefecture::all();
        // $User = $Prefecture;
        
        //都道府県id別配達個数
        $A = DeliveryRequest::where('deletion_date','=',null)
            ->select('delivery_destination_id', 'user_id')
            ->where('delivery_status', '=', 4)
            ->get();
        
        $users = User::where('deletion_date','=',null)->select('id', 'prefecture_id')->get();
        
        $fromPrefectures = [];
        $toPrefectures = [];
        $fromCounts = [];
        $toCounts = [];
        
        foreach ($A as $request) {
            $fromPrefectureId = $users->where('deletion_date','=',null)->where('id', $request->user_id)->pluck('prefecture_id')->first();
            $toPrefectureId = $users->where('deletion_date','=',null)->where('id', $request->delivery_destination_id)->pluck('prefecture_id')->first();
            
            // 出発地からのデータ数をカウント
            if (!isset($fromCounts[$fromPrefectureId])) {
                $fromCounts[$fromPrefectureId] = 1;
                $fromPrefectures[$fromPrefectureId] = $Prefecture->where('deletion_date','=',null)->where('id', $fromPrefectureId)->pluck('name')->first();
            } else {
                $fromCounts[$fromPrefectureId]++;
            }
            
            // 到着地へのデータ数をカウント
            if (!isset($toCounts[$toPrefectureId])) {
                $toPrefectures[$toPrefectureId] = $Prefecture->where('deletion_date','=',null)->where('id', $toPrefectureId)->pluck('name')->first();
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
        
        return view('admin.AdminViewUserStatisticsInfoGraph', compact('month', 'monthCounts', 'fromPrefectures', 'toPrefectures', 'fromCounts', 'toCounts'));
    }
}
