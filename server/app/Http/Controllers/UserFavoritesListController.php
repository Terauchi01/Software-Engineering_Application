<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoritesListController extends Controller
{
    public function userFavoritesList (){
        //viewの返すところは適当で良い
        return view('user.UserFavoritesList');
    }
}