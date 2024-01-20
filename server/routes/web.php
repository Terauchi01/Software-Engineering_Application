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
use App\Http\Controllers\AdminViewDroneTypeController;
use App\Http\Controllers\CoopDeliveryRequestListController;
use App\Http\Controllers\CoopViewUserDeliveryRequestListController;
use App\Http\Controllers\CoopDroneInfoListController;
use App\Http\Controllers\CoopDroneLentRequestController;
use App\Http\Controllers\CoopDroneListController;
use App\Http\Controllers\CoopDroneRegistrationController;
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
    // Route::middleware('admin')->group(function () {
        Route::post('adminLogoutFunction', [AdminLogoutController::class, 'adminLogoutFunction'])->name('adminLogoutFunction');
        Route::get('adminAllocateCoopDeliveryTask', [AdminAllocateCoopDeliveryTaskController::class, 'adminAllocateCoopDeliveryTask'])->name('adminAllocateCoopDeliveryTask');
        Route::get('adminAllocateCoopDeliveryTask/{id}', [AdminAllocateCoopDeliveryTaskController::class, 'delete'])->name('adminAllocateCoopDeliveryTaskDelete');
        Route::get('adminEditAdminDrone/{id}', [AdminEditAdminDroneController::class, 'adminEditAdminDrone'])->name('adminEditAdminDrone');
        Route::post('editDrone', [AdminEditAdminDroneController::class, 'editDrone'])->name('editDrone');
        Route::get('adminEditCoopDroneInfo/{id}', [AdminEditCoopDroneInfoController::class, 'adminEditCoopDroneInfo'])->name('adminEditCoopDroneInfo');
        Route::post('editCoopDrone', [AdminEditCoopDroneInfoController::class, 'editCoopDrone'])->name('editCoopDrone');
        Route::get('adminEditCoopInfo/{id}', [AdminEditCoopInfoController::class, 'adminEditCoopInfo'])->name('adminEditCoopInfo');
        // Route::get('adminEditCoopInfoApply', [AdminEditCoopInfoController::class, 'adminEditCoopInfoApply'])->name('adminEditCoopInfoApply');
        Route::post('adminEditCoopInfoApply', [AdminEditCoopInfoController::class, 'adminEditCoopInfoApply'])->name('adminEditCoopInfoApply');
        Route::get('adminEditCoopPayInfo/{id}', [AdminEditCoopPayInfoController::class, 'adminEditCoopPayInfo'])->name('adminEditCoopPayInfo');
        // Route::get('adminEditCoopPayInfoApply', [AdminEditCoopPayInfoController::class, 'adminEditCoopPayInfoApply'])->name('adminEditCoopPayInfoApply');
        Route::post('adminEditCoopPayInfoApply', [AdminEditCoopPayInfoController::class, 'adminEditCoopPayInfoApply'])->name('adminEditCoopPayInfoApply');
        Route::get('adminEditUserInfo/{id}', [AdminEditUserInfoController::class, 'adminEditUserInfo'])->name('adminEditUserInfo');
        // Route::get('adminEditUserInfoApply', [AdminEditUserInfoController::class, 'adminEditUserInfoApply'])->name('adminEditUserInfoApply');
        Route::post('adminEditUserInfoApply', [AdminEditUserInfoController::class, 'adminEditUserInfoApply'])->name('adminEditUserInfoApply');
        Route::get('adminEditUserPayInfo/{id}', [AdminEditUserPayInfoController::class, 'adminEditUserPayInfo'])->name('adminEditUserPayInfo');
        Route::get('adminLogout', [AdminLogoutController::class, 'adminLogout'])->name('adminLogout');
        Route::get('adminRegisterAdminDrone', [AdminRegisterAdminDroneController::class, 'adminRegisterAdminDrone'])->name('adminRegisterAdminDrone');
        Route::post('registerDrone', [AdminRegisterAdminDroneController::class, 'registerDrone'])->name('registerDrone');
        Route::get('adminViewUserPayInfo', [AdminViewUserPayInfoController::class, 'adminViewUserPayInfo'])->name('adminViewUserPayInfo');
        Route::get('adminViewUserStatisticsInfo', [AdminViewUserStatisticsInfoController::class, 'adminViewUserStatisticsInfo'])->name('adminViewUserStatisticsInfo');
        Route::get('adminViewUserStatisticsInfoGraph', [AdminViewUserStatisticsInfoController::class, 'adminViewUserStatisticsInfoGraph'])->name('adminViewUserStatisticsInfoGraph');
        Route::get('sendCoopBill', [AdminSendCoopBillController::class, 'adminSendCoopBill'])->name('adminSendCoopBill');
        Route::get('sendUserBill', [AdminSendUserBillController::class, 'adminSendUserBill'])->name('adminSendUserBill');
        Route::get('viewCoopApplyDroneLendList', [AdminViewCoopApplyDroneLendListController::class, 'adminViewCoopApplyDroneLendList'])->name('adminViewCoopApplyDroneLendList');
        Route::get('viewCoopDroneInfo', [AdminViewCoopDroneInfoController::class, 'adminViewCoopDroneInfo'])->name('adminViewCoopDroneInfo');
        Route::get('viewCoopDroneInfo/{id}', [AdminViewCoopDroneInfoController::class, 'delete'])->name('adminViewCoopDroneInfoDelete');
        Route::get('viewCoopInfo', [AdminViewCoopInfoController::class, 'adminViewCoopInfo'])->name('adminViewCoopInfo');
        Route::get('viewCoopList', [AdminViewCoopListController::class, 'adminViewCoopList'])->name('adminViewCoopList');
        Route::post('deleteAll', [AdminViewCoopListController::class, 'deleteAll'])->name('deleteAll');
        Route::get('viewCoopList/{id}', [AdminViewCoopListController::class, 'delete'])->name('adminViewCoopListDelete');
        Route::post('deleteAll', [AdminViewCoopListController::class, 'deleteAll'])->name('deleteAll');
        
        Route::get('viewUserDeliveryRequestList', [AdminViewUserDeliveryRequestListController::class, 'adminViewUserDeliveryRequestList'])->name('adminViewUserDeliveryRequestList');
        Route::get('adminViewCoopPayInfo', [AdminViewCoopPayInfoController::class, 'adminViewCoopPayInfo'])->name('adminViewCoopPayInfo');
        Route::get('adminViewCoopDeliveryRequestList', [AdminViewCoopDeliveryRequestListController::class, 'adminViewCoopDeliveryRequestList'])->name('adminViewCoopDeliveryRequestList');
        Route::get('adminViewCoopStatisticsInfo', [AdminViewCoopStatisticsInfoController::class, 'adminViewCoopStatisticsInfo'])->name('adminViewCoopStatisticsInfo');
        Route::get('adminViewCoopStatisticsInfoGraph', [AdminViewCoopStatisticsInfoController::class, 'adminViewCoopStatisticsInfoGraph'])->name('adminViewCoopStatisticsInfoGraph');
        Route::get('viewUserInfo', [AdminViewUserInfoController::class, 'adminViewUserInfo'])->name('adminViewUserInfo');
        Route::get('viewUserList', [AdminViewUserListController::class, 'adminViewUserList'])->name('adminViewUserList');
        Route::get('viewUserList/{id}', [AdminViewUserListController::class, 'delete'])->name('adminViewUserListDelete');
        Route::get('viewDroneType', [AdminViewDroneTypeController::class, 'adminViewDroneType'])->name('adminViewDroneType');
        Route::get('viewDroneType/{id}', [AdminViewDroneTypeController::class, 'delete'])->name('adminViewDroneTypeDelete');
    // });
});
Route::group(['prefix' => 'coop', 'as' => 'coop.'], function () {
    Route::get('/', function () {return view('coop.test');});
    Route::get('coopLogin', [CoopLoginController::class, 'coopLogin'])->name('coopLogin');
    Route::post('coopLoginFunction', [CoopLoginController::class, 'coopLoginFunction'])->name('coopLoginFunction');
    Route::get('coopApplyCoopRegister', [CoopRegistrationRequestController::class, 'coopApplyCoopRegister'])->name('coopApplyCoopRegister');
    Route::post('coopRegister', [CoopRegistrationRequestController::class, 'coopRegister'])->name('coopRegister');

    Route::middleware('coop')->group(function () {
        Route::post('coopLogoutFunction', [CoopLogoutController::class, 'coopLogoutFunction'])->name('coopLogoutFunction');
        Route::get('coopApplyAdminDroneLend', [CoopDroneLentRequestController::class, 'coopApplyAdminDroneLend'])->name('coopApplyAdminDroneLend');
        Route::post('applyDroneLend', [CoopDroneLentRequestController::class, 'applyDroneLend'])->name('applyDroneLend');
        Route::get('coopCheckUserDeliveryRequestListViewExecute', [CoopDeliveryRequestListController::class, 'coopCheckUserDeliveryRequestListViewExecute'])->name('coopCheckUserDeliveryRequestListViewExecute');
        Route::get('coopEditCoopInfo', [CoopEditCoopInfoController::class, 'coopEditCoopInfo'])->name('coopEditCoopInfo');
        Route::post('editCoopInfo', [CoopEditCoopInfoController::class, 'editCoopInfo'])->name('editCoopInfo');
        Route::get('coopViewUserDeliveryRequestList', [CoopViewUserDeliveryRequestListController::class, 'coopViewUserDeliveryRequestList'])->name('coopViewUserDeliveryRequestList');
        Route::get('coopFillterUserDeliveryRequestListView', [CoopDeliveryRequestListController::class, 'coopFillterUserDeliveryRequestListView'])->name('coopFillterUserDeliveryRequestListView');
        Route::get('coopLogout', [CoopLogoutController::class, 'coopLogout'])->name('coopLogout');
        Route::get('coopNoticeUserDeliveryRequestListViewDeliveryComplete', [CoopDeliveryRequestListController::class, 'coopNoticeUserDeliveryRequestListViewDeliveryComplete'])->name('coopNoticeUserDeliveryRequestListViewDeliveryComplete');
        Route::get('coopRegisterDrone', [CoopDroneRegistrationController::class, 'coopRegisterDrone'])->name('coopRegisterDrone');
        Route::post('registerDrone', [CoopDroneRegistrationController::class, 'registerDrone'])->name('registerDrone');
        Route::get('coopSearchUserDeliveryRequestListView', [CoopDeliveryRequestListController::class, 'coopSearchUserDeliveryRequestListView'])->name('coopSearchUserDeliveryRequestListView');
        Route::get('coopSortUserDeliveryRequestListViewInfo', [CoopDeliveryRequestListController::class, 'coopSortUserDeliveryRequestListViewInfo'])->name('coopSortUserDeliveryRequestListViewInfo');
        Route::get('coopViewOwnDrone', [CoopDroneListController::class, 'coopViewOwnDrone'])->name('coopViewOwnDrone');
        Route::get('droneInfoList', [CoopDroneInfoListController::class, 'coopDroneInfoList'])->name('coopDroneInfoList');
        Route::get('reportTrouble', [CoopReportTroubleController::class, 'coopReportTrouble'])->name('coopReportTrouble');
        Route::get('requestAdminDroneRepair', [CoopRequestAdminDroneRepairController::class, 'coopRequestAdminDroneRepair'])->name('coopRequestAdminDroneRepair');
        Route::get('coopWithdraw', [CoopWithdrawController::class, 'coopwithdraw'])->name('coopwithdraw');
        Route::get('withdraw', [CoopWithdrawController::class, 'withdraw'])->name('withdraw');
    });
});
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/', function () {return view('user.test');});
    Route::get('login', [UserLoginController::class, 'userLogin'])->name('userLogin');
    Route::post('userLoginFunction', [UserLoginController::class, 'userLoginFunction'])->name('userLoginFunction');
    Route::post('userRegister', [UserRegistrationController::class, 'userRegister'])->name('userRegister');
    Route::get('registration', [UserRegistrationController::class, 'userRegisterView'])->name('userRegisterView');

    Route::middleware('user')->group(function () {
        Route::post('userLogoutFunction', [UserLogoutController::class, 'userLogoutFunction'])->name('userLogoutFunction');
        Route::get('deliveryPlaceRequest', [UserDeliveryPlaceRequestController::class, 'userDeliveryPlaceRequest'])->name('userDeliveryPlaceRequest');
        Route::post('placeRequest', [UserDeliveryPlaceRequestController::class, 'placeRequest'])->name('placeRequest');
        Route::get('userDeliveryRequest', [UserDeliveryRequestController::class, 'userDeliveryRequest'])->name('userDeliveryRequest');
        Route::post('deliveryRequest', [UserDeliveryRequestController::class, 'deliveryRequest'])->name('deliveryRequest');
        Route::get('deliveryRequestList', [UserDeliveryRequestListController::class, 'userDeliveryRequestList'])->name('userDeliveryRequestList');
        Route::get('deliveryRequestList/{id}', [UserDeliveryRequestListController::class, 'delete'])->name('userDeliveryRequestListDelete');     
        Route::get('editInfo', [UserEditInfoController::class, 'userEditInfo'])->name('userEditInfo');
        Route::post('edit', [UserEditInfoController::class, 'userEdit'])->name('userEdit');
        Route::get('logout', [UserLogoutController::class, 'userLogout'])->name('userLogout');
        Route::get('userFavoritesList', [UserFavoritesListController::class, 'userFavoritesList'])->name('userFavoritesList');
        Route::get('userRegisterFavorites', [UserFavoritesRegisterController::class, 'userRegisterFavorites'])->name('userRegisterFavorites');
        Route::get('userReferFavoritesData', [UserFavoritesRegisterController::class, 'userReferFavoritesData'])->name('userReferFavoritesData');
        Route::get('userReceiveNoticeCompleteDelivery', [UserReceiveNoticeCompleteDeliveryController::class, 'userReceiveNoticeCompleteDelivery'])->name('userReceiveNoticeCompleteDelivery');
        Route::get('userWithdraw', [UserWithdrawController::class, 'userWithdraw'])->name('userWithdraw');
        Route::get('withdraw', [UserWithdrawController::class, 'withdraw'])->name('withdraw');
    });
});
Route::get('/index', [HelloController::class, 'index']);
