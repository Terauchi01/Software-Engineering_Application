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
                <option>管理者</option>
                <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
            </select>
            <p>@yield('name')</p> <!-- ここをユーザ名とする -->
        </div>
        <div class="side">
            @if ($currentPage === 'adminViewCoopList')
                <div class="current"><p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報一覧</a></p>
            @endif
            @if ($currentPage === 'adminViewCoopApplyDroneLendList')
                <div class="current"><p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請<br>一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請<br>一覧</a></p>
            @endif
            @if ($currentPage === 'adminViewUserList')
                <div class="current"><p><a href="{{ route('admin.adminViewUserList') }}">利用者情報一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報一覧</a></p>
            @endif
            @if ($currentPage === 'adminViewCoopStatisticsInfo')
                <div class="current"><p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            @endif
            @if ($currentPage === 'adminViewUserStatisticsInfo')
                <div class="current"><p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            @endif
            @if ($currentPage === 'adminAllocateCoopDeliveryTask')
                <div class="current"><p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
            @endif
            @if ($currentPage === 'adminViewDroneType')
                <div class="current"><p><a href="{{ route('admin.adminViewDroneType') }}">ドローンタイプ<br>一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewDroneType') }}">ドローンタイプ<br>一覧</a></p>
            @endif
            @if ($currentPage === 'adminViewCoopDeliveryRequestList')
                <div class="current"><p><a href="{{ route('admin.adminViewCoopDeliveryRequestList') }}">事業者宅配一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewCoopDeliveryRequestList') }}">事業者宅配一覧</a></p>
            @endif
            @if ($currentPage === 'adminViewUserDeliveryRequestList')
                <div class="current"><p><a href="{{ route('admin.adminViewUserDeliveryRequestList') }}">利用者宅配一覧</a></p></div>
            @else
                <p><a href="{{ route('admin.adminViewUserDeliveryRequestList') }}">利用者宅配一覧</a></p>
            @endif
        </div>
        
        @yield('content')
        
    </body>
</html>
