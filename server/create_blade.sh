#!/bin/bash

# Laravelプロジェクトのベースディレクトリを指定
laravel_project_dir="."

# コントローラーの名前を指定
controller_names=(
    "AdminLogin"
    "AdminLogout"
    "AdminAllocateCoopDeliveryTask"
    "AdminViewCoopApplyDroneLendList"
    "AdminRegisterAdminDrone"
    "AdminEditAdminDrone"
    "AdminViewCoopList"
    "AdminViewCoopInfo"
    "AdminEditCoopInfo"
    "AdminViewCoopPayInfo"
    "AdminEditCoopPayInfo"
    "AdminSendCoopBill"
    "AdminViewCoopDroneInfo"
    "AdminEditCoopDroneInfo"
    "AdminViewUserDeliveryRequestList"
    "AdminViewCoopStatisticsInfo"
    "AdminViewUserList"
    "AdminViewUserInfo"
    "AdminEditUserInfo"
    "AdminViewUserPayInfo"
    "AdminEditUserPayInfo"
    "AdminSendUserBill"
    "AdminViewUserDeliveryRequestList"
    "AdminViewUserStatisticsInfo"
    # "CoopLogin"
    # "CoopLogout"
    # "CoopRegistrationRequest"
    # "CoopEditCoopInfo"
    # "CoopDeliveryRequestList"
    # "CoopDroneList"
    # "CoopDroneRegistration"
    # "CoopChildAccountList"
    # "CoopCreateChildAccount"
    # "CoopDroneLentRequest"
    # "CoopWithdraw"
    # "CoopDroneInfoList"
    # "UserLogin"
    # "UserLogout"
    # "UserRegistration"
    # "UserEditInfo"
    # "UserDeliveryPlaceRequest"
    # "UserDeliveryRequest"
    # "UserDeliveryRequestList"
    # "UserFavoritesRegistor"
    # "UserWithdraw"
)

# LaravelのArtisanコマンドでコントローラーファイルを生成
for controller_name in "${controller_names[@]}"; do
    touch "./resources/views/admin/"${controller_name}".blade.php"
done
