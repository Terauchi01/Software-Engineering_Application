<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminViewUserListController extends Controller
{
    public function adminViewUserList (){
        $id = ['1', '2'];
        $user_name = ['情報', '環境'];
        $mail_address = ['info@info.kochi-tech.ac.jp', 'env@env.kochi-tech.ac.jp'];
        return view('admin.AdminViewUserList', compact('id', 'user_name', 'mail_address'));
    }
}
