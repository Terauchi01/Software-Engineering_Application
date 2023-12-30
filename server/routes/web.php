<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
use App\Http\Controllers\AdminSendCoopBillController;
use App\Http\Controllers\AdminSendUserBillController;
use App\Http\Controllers\AdminViewCoopApplyDroneLendListController;
use App\Http\Controllers\AdminViewCoopDeliveryRequestListController;
use App\Http\Controllers\AdminViewCoopDroneInfoController;
use App\Http\Controllers\AdminViewCoopInfoController;
use App\Http\Controllers\AdminViewCoopListController;
use App\Http\Controllers\AdminViewCoopPayInfoController;
use App\Http\Controllers\AdminViewCoopStatisticsInfoController;
use App\Http\Controllers\AdminViewUserDeliveryRequestListController;
use App\Http\Controllers\AdminViewUserInfoController;
use App\Http\Controllers\AdminViewUserListController;
use App\Http\Controllers\AdminViewUserPayInfoController;
use App\Http\Controllers\AdminViewUserStatisticsInfoController;
use App\Http\Controllers\CoopChildAccountListController;
use App\Http\Controllers\CoopCreateChildAccountController;
use App\Http\Controllers\CoopDeliveryRequestListController;
use App\Http\Controllers\CoopDroneInfoListController;
use App\Http\Controllers\CoopDroneLentRequestController;
use App\Http\Controllers\CoopDroneListController;
use App\Http\Controllers\CoopDroneRegistrationController;
use App\Http\Controllers\CoopEditChildCoopAccountController;
use App\Http\Controllers\CoopEditCoopInfoController;
use App\Http\Controllers\CoopLoginController;
use App\Http\Controllers\CoopLogoutController;
use App\Http\Controllers\CoopRegistrationRequestController;
use App\Http\Controllers\CoopReportTroubleController;
use App\Http\Controllers\CoopRequestAdminDroneRepairController;
use App\Http\Controllers\CoopWithdrawController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TerauchiController;
use App\Http\Controllers\UserDeliveryPlaceRequestController;
use App\Http\Controllers\UserDeliveryRequestController;
use App\Http\Controllers\UserDeliveryRequestListController;
use App\Http\Controllers\UserEditInfoController;
use App\Http\Controllers\UserFavoritesListController;
use App\Http\Controllers\UserFavoritesRegisterController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserLogoutController;
use App\Http\Controllers\UserReceiveNoticeCompleteDeliveryController;
use App\Http\Controllers\UserRegistrationController;
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
    Route::get('/', function () {return view('admin.test');})->name('admin');
    Route::get('adminLogin', [AdminLoginController::class, 'adminLogin'])->name('adminLogin');
    Route::post('adminLoginFunction', [AdminLoginController::class, 'adminLoginFunction'])->name('adminLoginFunction');
    Route::middleware('admin')->group(function () {
        Route::get('adminAllocateCoopDeliveryTask', [AdminAllocateCoopDeliveryTaskController::class, 'adminAllocateCoopDeliveryTask'])->name('adminAllocateCoopDeliveryTask');
        Route::get('adminEditAdminDrone', [AdminEditAdminDroneController::class, 'adminEditAdminDrone'])->name('adminEditAdminDrone');
        Route::get('adminEditCoopDroneInfo', [AdminEditCoopDroneInfoController::class, 'adminEditCoopDroneInfo'])->name('adminEditCoopDroneInfo');
        Route::get('adminEditCoopInfo', [AdminEditCoopInfoController::class, 'adminEditCoopInfo'])->name('adminEditCoopInfo');
        Route::get('adminEditCoopPayInfo', [AdminEditCoopPayInfoController::class, 'adminEditCoopPayInfo'])->name('adminEditCoopPayInfo');
        Route::get('adminEditUserInfo', [AdminEditUserInfoController::class, 'adminEditUserInfo'])->name('adminEditUserInfo');
        Route::get('adminEditUserPayInfo', [AdminEditUserPayInfoController::class, 'adminEditUserPayInfo'])->name('adminEditUserPayInfo');
        Route::get('adminLogout', [AdminLogoutController::class, 'adminLogout'])->name('adminLogout');
        Route::get('adminRegisterAdminDrone', [AdminRegisterAdminDroneController::class, 'adminRegisterAdminDrone'])->name('adminRegisterAdminDrone');
        Route::get('adminViewUserPayInfo', [AdminViewUserPayInfoController::class, 'adminViewUserPayInfo'])->name('adminViewUserPayInfo');
        Route::get('adminViewUserStatisticsInfo', [AdminViewUserStatisticsInfoController::class, 'adminViewUserStatisticsInfo'])->name('adminViewUserStatisticsInfo');
        Route::get('adminViewUserStatisticsInfoGraph', [AdminViewUserStatisticsInfoController::class, 'adminViewUserStatisticsInfoGraph'])->name('adminViewUserStatisticsInfoGraph');
        Route::get('sendCoopBill', [AdminSendCoopBillController::class, 'adminSendCoopBill'])->name('adminSendCoopBill');
        Route::get('sendUserBill', [AdminSendUserBillController::class, 'adminSendUserBill'])->name('adminSendUserBill');
        Route::get('viewCoopApplyDroneLendList', [AdminViewCoopApplyDroneLendListController::class, 'adminViewCoopApplyDroneLendList'])->name('adminViewCoopApplyDroneLendList');
        Route::get('viewCoopDroneInfo', [AdminViewCoopDroneInfoController::class, 'adminViewCoopDroneInfo'])->name('adminViewCoopDroneInfo');
        Route::get('viewCoopInfo', [AdminViewCoopInfoController::class, 'adminViewCoopInfo'])->name('adminViewCoopInfo');
        Route::get('viewCoopList', [AdminViewCoopListController::class, 'adminViewCoopList'])->name('adminViewCoopList');
        Route::get('viewUserDeliveryRequestList', [AdminViewUserDeliveryRequestListController::class, 'adminViewUserDeliveryRequestList'])->name('adminViewUserDeliveryRequestList');
        Route::get('adminViewCoopPayInfo', [AdminViewCoopPayInfoController::class, 'adminViewCoopPayInfo'])->name('adminViewCoopPayInfo');
        Route::get('adminViewCoopDeliveryRequestList', [AdminViewCoopDeliveryRequestListController::class, 'adminViewCoopDeliveryRequestList'])->name('adminViewCoopDeliveryRequestList');
        Route::get('adminViewCoopStatisticsInfo', [AdminViewCoopStatisticsInfoController::class, 'adminViewCoopStatisticsInfo'])->name('adminViewCoopStatisticsInfo');
        Route::get('adminViewCoopStatisticsInfoGraph', [AdminViewCoopStatisticsInfoController::class, 'adminViewCoopStatisticsInfoGraph'])->name('adminViewCoopStatisticsInfoGraph');
        Route::get('viewUserInfo', [AdminViewUserInfoController::class, 'adminViewUserInfo'])->name('adminViewUserInfo');
        Route::get('viewUserList', [AdminViewUserListController::class, 'adminViewUserList'])->name('adminViewUserList');
    });
});
Route::group(['prefix' => 'coop', 'as' => 'coop.'], function () {
    Route::get('/', function () {return view('coop.test');});
    Route::get('coopLogin', [CoopLoginController::class, 'coopLogin'])->name('coopLogin');
    Route::post('coopLoginFunction', [CoopLoginController::class, 'coopLoginFunction'])->name('coopLoginFunction');
    Route::middleware('coop')->group(function () {
        Route::get('coopAllExecuteChildCoopAccountListView', [CoopChildAccountListController::class, 'coopAllExecuteChildCoopAccountListView'])->name('coopAllExecuteChildCoopAccountListView');
        Route::get('coopAllSelectChild', [CoopChildAccountListController::class, 'coopAllSelectChild'])->name('coopAllSelectChild');
        Route::get('coopApplyAdminDroneLend', [CoopDroneLentRequestController::class, 'coopApplyAdminDroneLend'])->name('coopApplyAdminDroneLend');
        Route::get('coopApplyCoopRegister', [CoopRegistrationRequestController::class, 'coopApplyCoopRegister'])->name('coopApplyCoopRegister');
        Route::get('coopCheckUserDeliveryRequestListViewExecute', [CoopDeliveryRequestListController::class, 'coopCheckUserDeliveryRequestListViewExecute'])->name('coopCheckUserDeliveryRequestListViewExecute');
        Route::get('coopDeleteChildCoopAccount', [CoopChildAccountListController::class, 'coopDeleteChildCoopAccount'])->name('coopDeleteChildCoopAccount');
        Route::get('coopEditChildCoopAccount', [CoopEditChildCoopAccountController::class, 'coopEditChildCoopAccount'])->name('coopEditChildCoopAccount');
        Route::get('coopEditCoopInfo', [CoopEditCoopInfoController::class, 'coopEditCoopInfo'])->name('coopEditCoopInfo');
        Route::get('coopFillterUserDeliveryRequestListView', [CoopDeliveryRequestListController::class, 'coopFillterUserDeliveryRequestListView'])->name('coopFillterUserDeliveryRequestListView');
        Route::get('coopFilterChildCoopAccountListView', [CoopChildAccountListController::class, 'coopFilterChildCoopAccountListView'])->name('coopFilterChildCoopAccountListView');
        Route::get('coopLogout', [CoopLogoutController::class, 'coopLogout'])->name('coopLogout');
        Route::get('coopNoticeUserDeliveryRequestListViewDeliveryComplete', [CoopDeliveryRequestListController::class, 'coopNoticeUserDeliveryRequestListViewDeliveryComplete'])->name('coopNoticeUserDeliveryRequestListViewDeliveryComplete');
        Route::get('coopPublishChildCoopAccount', [CoopCreateChildAccountController::class, 'coopPublishChildCoopAccount'])->name('coopPublishChildCoopAccount');
        Route::get('coopRegisterDrone', [CoopDroneRegistrationController::class, 'coopRegisterDrone'])->name('coopRegisterDrone');
        Route::get('coopSearchChildCoopAccountListView', [CoopChildAccountListController::class, 'coopSearchChildCoopAccountListView'])->name('coopSearchChildCoopAccountListView');
        Route::get('coopSearchUserDeliveryRequestListView', [CoopDeliveryRequestListController::class, 'coopSearchUserDeliveryRequestListView'])->name('coopSearchUserDeliveryRequestListView');
        Route::get('coopSortChildCoopAccountListViewInfo', [CoopChildAccountListController::class, 'coopSortChildCoopAccountListViewInfo'])->name('coopSortChildCoopAccountListViewInfo');
        Route::get('coopSortUserDeliveryRequestListViewInfo', [CoopDeliveryRequestListController::class, 'coopSortUserDeliveryRequestListViewInfo'])->name('coopSortUserDeliveryRequestListViewInfo');
        Route::get('coopViewChildCoopAccountList', [CoopChildAccountListController::class, 'coopViewChildCoopAccountList'])->name('coopViewChildCoopAccountList');
        Route::get('coopViewOwnDrone', [CoopDroneListController::class, 'coopViewOwnDrone'])->name('coopViewOwnDrone');
        Route::get('droneInfoList', [CoopDroneInfoListController::class, 'coopDroneInfoList'])->name('coopDroneInfoList');
        Route::get('reportTrouble', [CoopReportTroubleController::class, 'coopReportTrouble'])->name('coopReportTrouble');
        Route::get('requestAdminDroneRepair', [CoopRequestAdminDroneRepairController::class, 'coopRequestAdminDroneRepair'])->name('coopRequestAdminDroneRepair');
    });
    Route::get('withdraw', [CoopWithdrawController::class, 'coopwithdraw'])->name('coopwithdraw');
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', function () {return view('user.test');});
    Route::get('login', [UserLoginController::class, 'userLogin'])->name('userLogin');
    Route::post('userLoginFunction', [UserLoginController::class, 'userLoginFunction'])->name('userLoginFunction');
    Route::middleware('user')->group(function () {
        Route::get('deliveryPlaceRequest', [UserDeliveryPlaceRequestController::class, 'userDeliveryPlaceRequest'])->name('userDeliveryPlaceRequest');
        Route::get('deliveryRequest', [UserDeliveryRequestController::class, 'userDeliveryRequest'])->name('userDeliveryRequest');
        Route::get('deliveryRequestList', [UserDeliveryRequestListController::class, 'userDeliveryRequestList'])->name('userDeliveryRequestList');
        Route::get('editInfo', [UserEditInfoController::class, 'userEditInfo'])->name('userEditInfo');
        Route::get('logout', [UserLogoutController::class, 'userLogout'])->name('userLogout');
        Route::get('registration', [UserRegistrationController::class, 'userRegisterAccount'])->name('userRegisterAccount');
        Route::get('userFavoritesList', [UserFavoritesListController::class, 'userFavoritesList'])->name('userFavoritesList');
        Route::get('userRegisterFavorites', [UserFavoritesRegisterController::class, 'userRegisterFavorites'])->name('userRegisterFavorites');
        Route::get('userReferFavoritesData', [UserFavoritesRegisterController::class, 'userReferFavoritesData'])->name('userReferFavoritesData');
        Route::get('userReceiveNoticeCompleteDelivery', [UserReceiveNoticeCompleteDeliveryController::class, 'userReceiveNoticeCompleteDelivery'])->name('userReceiveNoticeCompleteDelivery');
        Route::get('userWithdraw', [UserWithdrawController::class, 'userWithdraw'])->name('userWithdraw');
    });
});
//テスト用のコード
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
