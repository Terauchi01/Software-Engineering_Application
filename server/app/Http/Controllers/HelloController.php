<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HelloController extends Controller
{
    public function index () 
    {
        $hello = 'Hello, World!';
        $users = User::all();
        return view('index', compact('hello', 'users'));
    }
}
