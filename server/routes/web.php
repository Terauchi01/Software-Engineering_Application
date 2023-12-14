<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\loginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('test');
});
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.test');
    });
});
Route::group(['prefix' => 'coop', 'as' => 'coop.'], function () {
    Route::get('/', function () {
        return view('coop.test');
    });
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', function () {
        return view('user.test');
    });
});
Route::get('/index', [HelloController::class, 'index']);
Route::get('/send_date', [HelloController::class, 'send_date']);
Route::post('/send_date/add', [HelloController::class, 'update_controller']);
Route::get('/show', [HelloController::class, 'insert_controller']);
Route::get('/test', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'login']);

