<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>退会確認</title>
        <link rel="stylesheet" href="{{ asset('css/admin/AdminLogout.css') }}"
    </head>
    <body>
        <div class="logout">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <p>本当に退会しますか?</p>
            <div class="logout_form">
                @csrf
                <button onclick="location.href='{{ route('coop.withdraw') }}'">退会する</button>
                <button onclick="location.href='{{ route('coop.coopDeliveryRequestList') }}'">トップへ戻る</button>
            </div>
        </div>
    </body>
</html>
