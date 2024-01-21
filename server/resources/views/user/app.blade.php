<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('css/common/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/text.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common/innputBoxes.css') }}">
    @yield('style')
    @show
    @yield('script')
    @show
</head>

<body>
    <div class="header">
        <select onChange="location.href=value;">
            <option>利用者</option>
            <option value="{{ route('user.userLogout') }}">ログアウト</option>
            <option value="{{ route('user.userWithdraw') }}">退会</option>
        </select>
        <p>@yield('name')</p> <!-- ここをユーザ名とする -->
    </div>
    <div class="side">
        @if ($currentPage === 'userDeliveryRequestList')
        <div class="current">
            <p><a href="{{ route('user.userDeliveryRequestList') }}">宅配依頼一覧</a></p>
        </div>
        @else
        <p><a href="{{ route('user.userDeliveryRequestList') }}">宅配依頼一覧</a></p>
        @endif
        @if ($currentPage === 'userDeliveryPlaceRequest')
        <div class="current">
            <p><a href="{{ route('user.userDeliveryPlaceRequest') }}">宅配場所登録</a></p>
        </div>
        @else
        <p><a href="{{ route('user.userDeliveryPlaceRequest') }}">宅配場所登録</a></p>
        @endif
        @if ($currentPage === 'userDeliveryRequest')
        <div class="current">
            <p><a href="{{ route('user.userDeliveryRequest') }}">宅配依頼</a></p>
        </div>
        @else
        <p><a href="{{ route('user.userDeliveryRequest') }}">宅配依頼</a></p>
        @endif
    </div>

    @yield('content')

</body>

</html>