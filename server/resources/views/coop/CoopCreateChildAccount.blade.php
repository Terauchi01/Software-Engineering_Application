<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>子アカウント発行</title>
    <link rel="stylesheet" href="{{ asset('css/coop/CoopRegistration.css') }}">
    <style>
        .current {
            background-color: #ffffff;
            height: 20pt;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="contents">
        <form action="{{ route('coop.coopRegister') }}" method="POST">
            @csrf
            <div class="inputs">
                <h2>企業情報</h2>
                <label for="email_address">メールアドレス</label>
                <input type="email" name="email_address" placeholder="exsample@exsample.com" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;" required><br>

                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="8文字以上32文字以下、英数字" pattern="\w{8,32}" required><br>

                <label for="coop_name">事業者名</label>
                <input type="text" name="coop_name" placeholder="事業者名" required><br>

                <div class="name">
                    <label for="representative_last_name">事業代表者</label>
                    <input type="text" name="representative_last_name" placeholder="性" required>

                    <!-- <label for="representative_first_name">事業代表者名</label> -->
                    <input type="text" name="representative_first_name" placeholder="名" required><br>
                </div>

                <div class="name">
                    <label for="representative_last_name_kana">事業代表者(カナ)</label>
                    <input type="text" name="representative_last_name_kana" placeholder="セイ" required>

                    <!-- <label for="representative_first_name_kana">名カナ</label> -->
                    <input type="text" name="representative_first_name_kana" placeholder="メイ" required><br>
                </div>

                <label for="employees">従業員数</label>
                <input type="number" name="employees" placeholder="0" required><br>

                <div class="phone">
                    <label for="phone_number">電話番号</label>
                    <input type="tel" name="phone_number" placeholder="000" size="3" pattern="\d{3}" required>
                    <input type="tel" name="phone_number" placeholder="000" size="4" pattern="\d{4}" required>
                    <input type="tel" name="phone_number" placeholder="000" size="4" pattern="\d{4}" required>
                </div>

                <div class="land_or_air">
                    <input type="radio" name="land_or_air" value="1" required>
                    <label for="land">陸</label>
                    <input type="radio" name="land_or_air" value="2" required>
                    <label for="land">空</label>
                </div>
            </div>

            <div class="inputs">
                <h2>免許情報</h2>
                <label for="date_of_issue">公布日</label>
                <input type="date" name="date_of_issue" required><br>

                <label for="date_of_registration">登録日</label>
                <input type="date" name="date_of_registration" required><br>

                <label for="name">名前</label>
                <input type="text" name="name" required><br>

                <label for="birth">生年月日</label>
                <input type="date" name="birth" required><br>

                <label for="conditions">条件</label>
                <input type="text" name="conditions" required><br>

                <label for="classification">区分</label>
                <input type="text" name="classification" required><br>

                <label for="ratings_and_limitations1">限定事項1</label>
                <input type="text" name="ratings_and_limitations1" required><br>

                <label for="ratings_and_limitations2">限定事項2</label>
                <input type="text" name="ratings_and_limitations2"><br>

                <label for="ratings_and_limitations3">限定事項3</label>
                <input type="text" name="ratings_and_limitations3"><br>

                <label for="number">番号</label>
                <input type="text" name="number" required><br>
            </div>

            <div class="inputs">
                <h2>銀行情報</h2>
                <label for="bank_id">銀行名</label>
                <input type="text" name="bank_id" placeholder="銀行名" required>

                <label for="branch_id">支店名</label>
                <input type="text" name="branch_id" placeholder="支店名" required><br>

                <label for="account_type">口座の種別</label>
                <input type="text" name="account_type" placeholder="口座の種別" required>

                <label for="account_number">口座番号</label>
                <input type="text" name="account_number" placeholder="口座番号" required><br>

                <label for="account_name">口座の持ち主の名前</label>
                <input type="text" name="account_name" placeholder="名前" required>

                <label for="account_name_kana">口座持ち主のカナ</label>
                <input type="text" name="account_name_kana" placeholder="ナマエ" required><br>
            </div>

            <div class="regist">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>

</html>

@if ($errors->any())
<div>
    <strong>入力エラーがあります。</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div>
    <p>{{ session('success') }}</p>
</div>
@endif