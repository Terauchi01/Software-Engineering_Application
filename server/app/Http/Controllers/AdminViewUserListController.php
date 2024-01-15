<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminViewUserListController extends Controller
{
    public function adminViewUserList() {
        $list = User::select(
            'user.id',
            'user.user_last_name',
            'user.user_first_name',
            'user.email_address'
        )
              ->where('user.deletion_date', '=', null)
              ->orderBy('user.id', 'asc')
              ->get();

        $mergedData = [];

        foreach ($list as $item) {
            $mergedData[] = [
                'id' => $item->id,
                'user_name' => $item->user_last_name." ".$item->user_first_name,
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
}

// $id = ['1', '2'];
// $user_name = ['情報', '環境'];
// $mail_address = ['info@info.kochi-tech.ac.jp', 'env@env.kochi-tech.ac.jp'];
// return view('admin.AdminViewUserList', compact('id', 'user_name', 'mail_address'));

