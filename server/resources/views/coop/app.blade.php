<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>
            @yield('title')
            </title>
            @yield('style')
            @show
            @yield('script')
            @show
            </head>
            <body>
            <div class="header">
            <select onChange="location.href=value;">
            <option>事業者</option>
            <option value="{{ route('coop.coopLogout') }}">ログアウト</option>
            <option value="{{ route('coop.coopwithdraw') }}">退会申請</option>
            </select>
            <p>@yield('name')</p> <!-- ここをユーザ名とする -->
            </div>
            <div class="side">
            @if ($currentPage === 'coopDeliveryRequestList')
            <div class="current"><p><a href="{{ route('coop.coopDeliveryRequestList') }}">依頼一覧</a></p></div>
            @else
            <p><a href="{{ route('coop.coopDeliveryRequestList') }}">依頼一覧</a></p>
            @endif
            @if ($currentPage === 'coopDroneInfoList')
            <div class="current"><p><a href="{{ route('coop.coopDroneInfoList') }}">ドローン情報一覧</a></p></div>
            @else
            <p><a href="{{ route('coop.coopDroneInfoList') }}">ドローン情報一覧</a></p>        
            @endif
            @if ($currentPage === 'coopRegisterDrone')
            <div class="current"><p><a href="{{ route('coop.coopRegisterDrone') }}">ドローン登録</a></p></div>
            @else
            <p><a href="{{ route('coop.coopRegisterDrone') }}">ドローン登録</a></p>
            @endif
            @if ($currentPage === 'coopApplyAdminDroneLend')
            <div class="current"><p><a href="{{ route('coop.coopApplyAdminDroneLend') }}">ドローン貸与申請</a></p></div>
            @else
            <p><a href="{{ route('coop.coopApplyAdminDroneLend') }}">ドローン貸与申請</a></p>
            @endif
            @if ($currentPage === 'coopEditCoopInfo')
            <div class="current"><p><a href="{{ route('coop.coopEditCoopInfo',["id"=>1]) }}">事業者情報編集</a></p></div>
            @else
            <p><a href="{{ route('coop.coopEditCoopInfo',["id"=>1]) }}">事業者情報編集</a></p>
            @endif
            </div>

            @yield('content')
        
    </body>
</html>
