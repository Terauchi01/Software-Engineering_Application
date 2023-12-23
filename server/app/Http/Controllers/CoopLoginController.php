<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CoopLoginController extends Controller
{
    // ログイン(事業者)
    public function coopLogin (){
        //viewの返すところは適当で良い
        return view('coop.coopLogin');
    }
}