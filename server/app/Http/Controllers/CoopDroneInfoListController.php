<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoopDroneInfoListController extends Controller
{
    public function coopDroneInfoList() {
        $id = ["1", "2", "3"];
        $drone_id = ["1", "2", "3"];
        $drone_type = ["ドローンA", "ドローンB", "ドローンC"];
        $drone_status = ["配達中", "保管中", "故障中"];

        $mergedData = [
            'id' => $id,
            'drone_id' => $drone_id,
            'drone_type' => $drone_type,
            'drone_status' => $drone_status,
        ];

        return view("coop.CoopDroneInfoList", compact('mergedData'));
    }
}
