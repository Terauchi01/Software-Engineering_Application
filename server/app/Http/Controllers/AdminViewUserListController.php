<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewUserListController extends Controller
{
    public function adminViewUserList(Request $request) {
        $id = $request->input('id');
        
        $query = User::select(
            'user.id',
            'user.user_last_name',
            'user.user_first_name',
            'user.email_address',
            'unpaid_charge'
        )
              ->where('user.deletion_date', '=', null)
              ->orderBy('user.id', 'asc');             

        if ($id != NULL) {
            $query->where('user.id', '=', $id);
        }
        $list = $query->get();
        
        $mergedData = [];

        foreach ($list as $item) {

            $mergedData[] = [
                'id' => $item->id,
                'user_name' => $item->user_last_name . ' ' . $item->user_first_name,
                'email_address' => $item->email_address,
            ];
        }

        return view('admin.AdminViewUserList', compact('mergedData'));
    }


    public function delete(Request $request, $id)
    {
        $B = User::class;
        $currentDateTime = Carbon::now();
        $B::where('id',$id)->update(['deletion_date' => $currentDateTime]);
        return redirect()->route('admin.adminViewUserList');
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


