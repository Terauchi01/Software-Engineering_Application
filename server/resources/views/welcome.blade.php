<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" href="{{ asset('css/admin/AdminLogout.css') }}">
    </head>

    <body>
        <div class="logout">
            <p>利用タイプを選択してください</p>
            <div class="logout_form">
                @csrf
                <button onclick="location.href='{{ route('admin.adminLogin') }}'">管理者ログイン</button>
                <button onclick="location.href='{{ route('coop.coopLogin') }}'">事業者ログイン</button>
                <button onclick="location.href='{{ route('user.userLogin') }}'">利用者ログイン</button>
            </div>
        </div>
    </body>
</html>

