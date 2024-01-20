<!DOCTYPE html>
<html lang="ja">

<head>
    <title>会員情報編集</title>
    <link rel="stylesheet" href="{{ asset('/css/common/EditInfo.css') }}">
</head>

<body>
    <div class="header">
        <select onChange="location.href=value;">
            <option>ユーザー</option>
            <option value="{{ route('user.userLogout') }}">ログアウト</option>
        </select>
        <p>user</p> <!-- ここをユーザ名とする -->
    </div>

    <nav class="side">
    </nav>

    <div class="info">
        <h2><u>会員情報編集</u></h2>
        <p class="name">{{ $user->user_first_name }} {{ $user->user_last_name }}</p>

        <form action="{{ route('user.userEdit') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <table>
                <tr>
                    <th>メールアドレス</th>
                    <th>
                        <div class="left">
                            <input type="email" name="email_address" value="{{ $user->email_address }}" placeholder="example@mail.com" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <th>
                        <div class="left">
                            <input type="password" name="password" placeholder="{{ $user->password }}" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>郵便番号</th>
                    <th>
                        <div class=" left">
                            <input type="text" name="postal_code" value="{{ $user->postal_code }}" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>都道府県id</th>
                    <th>
                        <div class="left">
                            <input type="text" name="prefecture_id" value="{{ $user->prefecture_id }}" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>市区町村id</th>
                    <th>
                        <div class="left">
                            <input type="text" name="city_id" value="{{ $user->city_id }}" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>town</th>
                    <th>
                        <div class="left">
                            <input type="text" name="town" value="{{ $user->town }}" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>block</th>
                    <th>
                        <div class="left">
                            <input type="text" name="block" value="{{ $user->block }}" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <th>
                        <div class="left">
                            <input type="text" name="phone_number" value="{{ $user->phone_number }}" pattern="\d{10,11}" placeholder="ハイフン無しで入力してください" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>利用者名</th>
                    <th>
                        <div class="left">
                            <input type="text" name="user_last_name" value="{{ $user->user_last_name }}" placeholder="姓" required>
                            <input type="text" name="user_first_name" value="{{ $user->user_first_name }}" placeholder="名" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>利用者名カナ</th>
                    <th>
                        <div class="left">
                            <input type="text" name="user_last_name_kana" value="{{ $user->user_last_name_kana }}" placeholder="セイ" required>
                            <input type="text" name="user_first_name_kana" value="{{ $user->user_first_name_kana }}" placeholder="メイ" required>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>未払いのお金</th>
                    <th>
                        <div class="left">
                            <input type="text" name="unpaid_charge" value="{{ $user->unpaid_charge }}" required>
                        </div>
                    </th>
                </tr>
            </table>
            <div class="confirm">
                <button type="submit" name="update">
                    上記の内容で更新
                </button>
            </div>
        </form>
    </div>
</body>

</html>