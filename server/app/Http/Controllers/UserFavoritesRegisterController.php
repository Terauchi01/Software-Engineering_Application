<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoritesRegisterController extends Controller
{
    public function userRegisterFavorites (){
        //viewの返すところは適当で良い
        return view('user.userFavoritesRegister');
    }
    public function userReferFavoritesData (){
        //viewの返すところは適当で良い
        return view('user.userFavoritesRegister');
    }
}