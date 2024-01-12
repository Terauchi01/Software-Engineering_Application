<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="{{ asset('/css/admin/AdminLogin.css') }}">
    </head>
    <body>
        <div class="login">
            <div class="sys_name">
                AeroNet
            </div>

            @if($errors->has('login'))
            <div>
                {{ $errors->first('login') }}
            </div>
            @endif
            <form action="{{ route('admin.adminLoginFunction') }}" method="POST" class="login_form">
                @csrf
                <input type="text" name="user_name" placeholder="ユーザ名" required>
                <input type="password" name="password" placeholder="パスワード" required>
                <button type="submit" class="login_">ログイン</button>
            </form>
        </div>
    </body>
</html>
