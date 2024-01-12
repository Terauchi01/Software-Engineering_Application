<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAllocateCoopDeliveryTaskController extends Controller
{
    public function adminAllocateCoopDeliveryTask (){
        $id = ['1', '2'];
        $send_address = ['わかめ県こんぶ町', 'わかめ県めかぶ町'];
        $receive_address = ['わかめ県めかぶ町', 'わかめ県マシュマロ町'];
        $coop = ['事業者名A', '事業者名B'];
        return view('admin.AdminAllocateCoopDeliveryTask', compact('id', 'send_address', 'receive_address', 'coop'));
    }
}
/* id
 * delivery_destination_id(多分ユーザid)
 * collection_company_id
 * delivery_company_id
 * collection_company_remuneration
 * delivery_company_remuneration
 * delivery_status(未割り振りのもののみ選択)
 * request_date
 * collection_location_id(追加が必要)
 * user_id(追加が必要) */

/* user
 * id
 * address
 * postal_code
 * user_last_name
 * user_first_name
 * delivery_location_image_list_id */
