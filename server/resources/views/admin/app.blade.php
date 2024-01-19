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
            <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
            <p><a href="{{ route('admin.adminViewDroneType') }}">ドローンタイプ　一覧</a></p>
            <p><a href="{{ route('admin.adminViewCoopDeliveryRequestList') }}">事業者宅配一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserDeliveryRequestList') }}">利用者宅配一覧</a></p>
        </div>
        
        @yield('content')
        
    </body>
</html>
