<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TerauchiController;
use App\Http\Controllers\AdminViewCoopPayInfoController;
use App\Http\Controllers\AdminViewCoopDeliveryRequestListController;
use App\Http\Controllers\AdminViewCoopStatisticsInfoController;
use App\Http\Controllers\CoopLoginController;
use App\Http\Controllers\CoopLogoutController;
use App\Http\Controllers\CoopRegistrationRequestController;
use App\Http\Controllers\UserFavoritesListController;
use App\Http\Controllers\UserFavoritesRegisterController;
use App\Http\Controllers\UserReceiveNoticeCompleteDeliveryController;
use App\Http\Controllers\UserWithdrawController;

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
    Route::get('adminViewCoopPayInfo', [AdminViewCoopPayInfoController::class, 'adminViewCoopPayInfo'])->name('adminViewCoopPayInfo');
    Route::get('adminViewCoopDeliveryRequestList', [AdminViewCoopDeliveryRequestListController::class, 'adminViewCoopDeliveryRequestList'])->name('adminViewCoopDeliveryRequestList');
    Route::get('adminViewCoopStatisticsInfo', [AdminViewCoopStatisticsInfoController::class, 'adminViewCoopStatisticsInfo'])->name('adminViewCoopStatisticsInfo');
    Route::get('adminViewCoopStatisticsInfoGraph', [AdminViewCoopStatisticsInfoController::class, 'adminViewCoopStatisticsInfoGraph'])->name('adminViewCoopStatisticsInfoGraph');
});
Route::group(['prefix' => 'coop', 'as' => 'coop.'], function () {
    Route::get('/', function () {
        return view('coop.test');
    });
    Route::get('coopLogin', [CoopLoginController::class, 'coopLogin'])->name('coopLogin');
    Route::get('coopLogout', [CoopLogoutController::class, 'coopLogout'])->name('coopLogout');
    Route::get('coopRegistrationRequest', [CoopRegistrationRequestController::class, 'coopApplyCoopRegister'])->name('coopRegistrationRequest');
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', function () {
        return view('user.test');
    });
    Route::get('userFavoritesList', [UserFavoritesListController::class, 'userFavoritesList'])->name('userFavoritesList');
    Route::get('userRegisterFavorites', [UserFavoritesRegisterController::class, 'userRegisterFavorites'])->name('userRegisterFavorites');
    Route::get('userReferFavoritesData', [UserFavoritesRegisterController::class, 'userReferFavoritesData'])->name('userReferFavoritesData');
    Route::get('userReceiveNoticeCompleteDelivery', [UserReceiveNoticeCompleteDeliveryController::class, 'userReceiveNoticeCompleteDelivery'])->name('userReceiveNoticeCompleteDelivery');
    Route::get('userWithdraw', [UserWithdrawController::class, 'userWithdraw'])->name('userWithdraw');
});
Route::group(['prefix' => 'terauchi', 'as' => 'terauchi.'], function () {
    Route::get('top', [TerauchiController::class, 'index'])->name('top');
    Route::get('login_view', [TerauchiController::class, 'login_view'])->name('login_view');
    // Route::get('loginUser', [TerauchiController::class, 'login'])->name('loginUser');
    Route::post('loginUser', [TerauchiController::class, 'login'])->name('loginUser');
    Route::get('list_view', [TerauchiController::class, 'list_view'])->name('list_view');
    // ->middleware('auth:users');
    Route::get('/', function () {
        return view('terauchi.top');
    });
    // Route::get('/user', function () {
    //     // 認証済みユーザーのみがこのルートにアクセス可能
    // })->middleware('auth');
});
Route::get('/index', [HelloController::class, 'index']);
Route::get('/send_date', [HelloController::class, 'send_date']);
Route::post('/send_date/add', [HelloController::class, 'update_controller']);
Route::get('/show', [HelloController::class, 'insert_controller']);
Route::get('/test', [loginController::class, 'index']);
Route::post('/login', [loginController::class, 'login']);