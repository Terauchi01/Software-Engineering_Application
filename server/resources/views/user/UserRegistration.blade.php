<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="{{ asset('/css/user/UserRegistration.css') }}">
    </head>
    <body>
        <div class="registration">
            <h2 style="color:#408A7E">新規会員登録</h2>
            <form action="{{ route('user.userRegister') }}" method="POST">
                {{ csrf_field() }}
                <table>
                    <tr>
                        <th>お客様氏名</th>
                        <th><input type="text" name="user_last_name" placeholder="姓" required></th>
                        <th><input type="text" name="user_first_name" placeholder="名" required></th>
                    </tr>
                    <tr>
                        <th>お客様氏名カナ</th>
                        <th><input type="text" name="user_last_name_kana" placeholder="セイ" required></th>
                        <th><input type="text" name="user_first_name_kana" placeholder="メイ" required></th>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <th><input type="text" name="postal_code" placeholder="郵便番号" required></th>
                        <th><input type="text" name="prefecture" placeholder="都道府県" required></th>
                        <th><input type="text" name="city" placeholder="市区町村" requred></th>
                        <th><input type="text" name="town" placeholder="住所"></th>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <th><input type="text" name="phone_number" placeholder="ハイフン無しで入力してください" required></th>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <th><input type="text" name="email_address" placeholder="mail@example.com" required></th>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <th><input type="password" name="password" placeholder="8文字以上32文字以下 英数字" required></th>
                    </tr>
                </table>
                <button type="submit" name="add">上記内容で登録する</button>
            </form>
        </div>
    </body>
</html>
