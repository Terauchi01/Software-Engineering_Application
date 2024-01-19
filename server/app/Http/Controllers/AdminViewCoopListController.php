<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPrefecture;
use App\Models\Cities;
use App\Models\CoopLocation;
use App\Models\CoopUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//事業者一覧

class AdminViewCoopListController extends Controller
{
    public function adminViewCoopList (Request $request){
        $id = $request->input('id');
        
        $CoopLocation = CoopLocation::all();
        $query = CoopUser::select(
            'coop_user.id',
            'coop_user.coop_name',
            'coop_user.representative_last_name',
            'coop_user.representative_first_name',
            'coop_user.pay_status',
            'coop_user.child_status',
            'coop_user.pair_id',
            'coop_user.deletion_date',
            'coop_location.postal_code',
            'coop_location.prefecture_id',
            'coop_location.city_id',
            'coop_location.town',
            'coop_location.block'
        )
              ->where('coop_user.deletion_date', '=', null)
              ->where('coop_location.deletion_date', '=', null)
              ->join('coop_location', 'coop_user.id', '=', 'coop_location.coop_user_id')
              ->orderBy('coop_user.id', 'asc');
        
        if ($id != NULL) {
            $query->where('coop_location.prefecture_id', '=', $id);
        }

        $list = $query->get();
        
        $Prefecture_list = MstPrefecture::pluck('name', 'id')->toArray();
        $Cities_list = Cities::pluck('name', 'id')->toArray();
        $mergedData = [];
        $A=['未','済'];
        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'coop_name' => $item->coop_name,
                'representative_name' => $item->representative_last_name." ".$item->representative_first_name,
                'coop_locations' => $Prefecture_list[$item->prefecture_id].$Cities_list[$item->city_id],
                'pay_status' => $A[$item->pay_status],
                'prefecture_id' => $item->prefecture_id,
                'prefecture_name' => $Prefecture_list[$item->prefecture_id],
            ];
        }   
        return view('admin.AdminViewCoopList', compact('mergedData'));
    }

    public function delete(Request $request, $id)
    {
        $B = CoopUser::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminViewCoopList');
    }

    public function deleteAll(Request $request)
    {
        // CSRFトークンを確認
        if ($request->header('X-CSRF-TOKEN') !== csrf_token()) {
            abort(403, 'Unauthorized action.');
        }
        // 送信されたデータを取得
        $data = $request->input('elements');

        foreach($data as $id){
            $B = CoopUser::class;
            $currentDateTime = Carbon::now();
            $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        }

        return response()->json(['message' => 'Delete operation completed.']);
    }
}


