<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TerauchiController;
use App\Http\Controllers\AdminAllocateCoopDeliveryTaskController;
use App\Http\Controllers\AdminEditAdminDroneController;
use App\Http\Controllers\AdminEditCoopDroneInfoController;
use App\Http\Controllers\AdminEditCoopInfoController;
use App\Http\Controllers\AdminEditCoopPayInfoController;
use App\Http\Controllers\AdminEditUserInfoController;
use App\Http\Controllers\AdminEditUserPayInfoController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\AdminRegisterAdminDroneController;
use App\Http\Controllers\AdminViewUserListController;
use App\Http\Controllers\AdminViewUserInfoController;
use App\Http\Controllers\AdminViewUserDeliveryRequestListController;
use App\Http\Controllers\CoopWithdrawController;
use App\Http\Controllers\CoopDroneInfoListController;
use App\Http\Controllers\CoopRequestAdminDroneRepairController;
use App\Http\Controllers\CoopReportTroubleController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserLogoutController;
use App\Http\Controllers\UserRegistrationController;
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
    Route::get('adminAllocateCoopDeliveryTask', [AdminAllocateCoopDeliveryTaskController::class, 'adminAllocateCoopDeliveryTask'])->name('adminAllocateCoopDeliveryTask');
    Route::get('adminEditAdminDrone', [AdminEditAdminDroneController::class, 'adminEditAdminDrone'])->name('adminEditAdminDrone');
    Route::get('adminEditCoopDroneInfo', [AdminEditCoopDroneInfoController::class, 'adminEditCoopDroneInfo'])->name('adminEditCoopDroneInfo');
    Route::get('adminEditCoopInfo', [AdminEditCoopInfoController::class, 'adminEditCoopInfo'])->name('adminEditCoopInfo');
    Route::get('adminEditCoopPayInfo', [AdminEditCoopPayInfoController::class, 'adminEditCoopPayInfo'])->name('adminEditCoopPayInfo');
    Route::get('adminEditUserInfo', [AdminEditUserInfoController::class, 'adminEditUserInfo'])->name('adminEditUserInfo');
    Route::get('adminEditUserPayInfo', [AdminEditUserPayInfoController::class, 'adminEditUserPayInfo'])->name('adminEditUserPayInfo');
    Route::get('adminLogin', [AdminLoginController::class, 'adminLogin'])->name('adminLogin');
    Route::get('adminLogout', [AdminLogoutController::class, 'adminLogout'])->name('adminLogout');
    Route::get('adminRegisterAdminDrone', [AdminRegisterAdminDroneController::class, 'adminRegisterAdminDrone'])->name('adminRegisterAdminDrone');
    Route::get('/', function () {
        return view('admin.test');
    });
    Route::get('viewUserList', [AdminViewUserListController::class, 'adminViewUserList'])->name('adminViewUserList');
    Route::get('viewUserInfo', [AdminViewUserInfoController::class, 'adminViewUserInfo'])->name('adminViewUserInfo');
    Route::get('viewUserDeliveryRequestList', [AdminViewUserDeliveryRequestListController::class, 'adminViewUserDeliveryRequestList'])->name('adminViewUserDeliveryRequestList');
});
Route::group(['prefix' => 'coop', 'as' => 'coop.'], function () {
    Route::get('/', function () {
        return view('coop.test');
    });
    Route::get('withdraw', [CoopWithdrawController::class, 'coopwithdraw'])->name('coopwithdraw');
    Route::get('droneInfoList', [CoopDroneInfoListController::class, 'coopDroneInfoList'])->name('coopDroneInfoList');
    Route::get('requestAdminDroneRepair', [CoopRequestAdminDroneRepairController::class, 'coopRequestAdminDroneRepair'])->name('coopRequestAdminDroneRepair');
    Route::get('reportTrouble', [CoopReportTroubleController::class, 'coopReportTrouble'])->name('coopReportTrouble');
    Route::get('coopLogin', [CoopLoginController::class, 'coopLogin'])->name('coopLogin');
    Route::get('coopLogout', [CoopLogoutController::class, 'coopLogout'])->name('coopLogout');
    Route::get('coopApplyCoopRegister', [CoopRegistrationRequestController::class, 'coopApplyCoopRegister'])->name('coopApplyCoopRegister');
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', function () {
        return view('user.test');
    });
    Route::get('login', [UserLoginController::class, 'userLogin'])->name('userLogin');
    Route::get('logout', [UserLogoutController::class, 'userLogout'])->name('userLogout');
    Route::get('registration', [UserRegistrationController::class, 'userRegisterAccount'])->name('userRegisterAccount');
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