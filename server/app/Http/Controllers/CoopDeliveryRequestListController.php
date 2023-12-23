<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopDeliveryRequestListController extends Controller
{
    public function coopFillterUserDeliveryRequestListView (){
        return view('coop.CoopDeliveryRequestList');
    }
    public function coopSearchUserDeliveryRequestListView (){
        return view('coop.CoopDeliveryRequestList');
    }
    public function coopSortUserDeliveryRequestListViewInfo (){
        return view('coop.CoopDeliveryRequestList');
    }
    public function coopCheckUserDeliveryRequestListViewExecute (){
        return view('coop.CoopDeliveryRequestList');
    }
    public function coopNoticeUserDeliveryRequestListViewDeliveryComplete (){
        return view('coop.CoopDeliveryRequestList');
    }
}
