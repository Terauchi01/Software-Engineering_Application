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

            <form action="{{ route('admin.adminLoginFunction') }}" method="POST" class="login_form">
                @csrf
                <input type="text" name="email" placeholder="メールアドレス" required>
                <input type="password" name="password" placeholder="パスワード" required>
                <button type="submit" class="login_">ログイン</button>
            </form>
        </div>
    </body>
</html>
