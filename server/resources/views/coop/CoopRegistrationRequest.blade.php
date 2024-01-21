<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>事業者登録</title>
    <link rel="stylesheet" href="{{ asset('css/common/Register.css') }}">
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
                <input type="email" name="email_address" placeholder="exemple@exemple.com" value="{{ old('email_address') }}" required><br>

                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="8文字以上32文字以下、英数字" pattern="\w{8,32}" required><br>

                <label for="coop_name">事業者名</label>
                <input type="text" name="coop_name" placeholder="事業者名" value="{{ old('coop_name') }}" required><br>

                <div class="name">
                    <label for="representative_last_name">事業代表者名</label>
                    <input type="text" name="representative_last_name" placeholder="姓" value="{{ old('representative_last_name') }}" required>
                    <input type="text" name="representative_first_name" placeholder="名" value="{{ old('representative_first_name') }}" required><br>
                </div>

                <div class="name">
                    <label for="representative_last_name_kana">事業代表者名(カナ)</label>
                    <input type="text" name="representative_last_name_kana" placeholder="セイ" value="{{ old('representative_last_name_kana') }}" required>
                    <input type="text" name="representative_first_name_kana" placeholder="メイ" value="{{ old('representative_first_name_kana') }}" required><br>
                </div>

                <label for="employees">従業員数</label>
                <input type="number" name="employees" placeholder="0" value="{{ old('employees') }}" required><br>

                <h2>事業所情報</h2><br>
                <label for="office_name">事業所名</label>
                <input type="text" name="office_name" value="{{ old('office_name') }}" required><br>

                <label for="postal_code"></label>
                <div>
                    <label for="postal_code">郵便番号</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                </div>
                <div>
                    <label for="prefecture_id">都道府県</label>
                    <select id="prefecture" name="prefecture_id" required>
                        @foreach ($Prefecture as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <label for="city_id">市区町村</label>
                    <select id="city" name="city_id" required></select>
                </div>
                <div>
                    <label for="town">市区町村以降の住所</label>
                    <input type="text" name="town" value="{{ old('town') }}" required>
                </div>
                <div>
                    <label for="block">建物名</label>
                    <input type="text" name="block" value="{{ old('block') }}" required>
                </div>
                <label for="representative_last_name">事業所代表者姓</label>
                <input type="text" name="office_representative_last_name" value="{{ old('office_representative_last_name') }}"><br>
                
                <label for="representative_first_name">事業所代表者名</label>
                <input type="text" name="office_representative_first_name" value="{{ old('office_representative_first_name') }}"><br>
                
                <label for="representative_last_name_kana">姓カナ</label>
                <input type="text" name="office_representative_last_name_kana" value="{{ old('office_representative_last_name_kana') }}"><br>
                
                <label for="representative_first_name_kana">名カナ</label>
                <input type="text" name="office_representative_first_name_kana" value="{{ old('office_representative_first_name_kana') }}"><br>
                
                <div class="phone">
                    <label for="phone_number">電話番号</label>
                    <input type="tel" name="phone_number" placeholder="ハイフンなしで入力して下さい" size="11" pattern="\d{11}" value="{{ old('phone_number') }}" required>
                </div>                

                <label for="land_or_air">陸運か空運か</label>
                <div class="land_or_air">
                    <input type="radio" name="land_or_air" value="1" {{ old('land_or_air') == '1' ? 'checked' : '' }} required>
                    <label for="land">陸運</label>
                    <input type="radio" name="land_or_air" value="2" {{ old('land_or_air') == '2' ? 'checked' : '' }} required>
                    <label for="air">空運(ドローン)</label>
                </div>
            </div>

            <div class="inputs">
                <h2>免許情報</h2>
                <label for="date_of_issue">公布日</label>
                <input type="date" name="date_of_issue" value="{{ old('date_of_issue') }}" required><br>

                <label for="date_of_registration">登録日</label>
                <input type="date" name="date_of_registration" value="{{ old('date_of_registration') }}" required><br>

                <label for="name">名前</label>
                <input type="text" name="name" value="{{ old('name') }}" required><br>

                <label for="birth">生年月日</label>
                <input type="date" name="birth" value="{{ old('birth') }}" required><br>

                <label for="conditions">条件</label>
                <input type="text" name="conditions" value="{{ old('conditions') }}"><br>

                <label for="classification">区分</label>
                <input type="text" name="classification" value="{{ old('classification') }}" required><br>

                <label for="ratings_and_limitations1">限定事項1</label>
                <input type="text" name="ratings_and_limitations1" value="{{ old('ratings_and_limitations1') }}" required><br>

                <label for="ratings_and_limitations2">限定事項2</label>
                <input type="text" name="ratings_and_limitations2" value="{{ old('ratings_and_limitations2') }}"><br>

                <label for="ratings_and_limitations3">限定事項3</label>
                <input type="text" name="ratings_and_limitations3" value="{{ old('ratings_and_limitations3') }}"><br>

                <label for="number">番号</label>
                <input type="text" name="number" value="{{ old('number') }}" required><br>
            </div>

            <div class="inputs">
                <h2>銀行情報</h2>
                <label for="bank_id">銀行名</label>
                <input type="text" name="bank_id" placeholder="銀行名" value="{{ old('bank_id') }}" required>

                <label for="branch_id">支店名</label>
                <input type="text" name="branch_id" placeholder="支店名" value="{{ old('branch_id') }}" required><br>

                <label for="account_type">口座の種別</label>
                <input type="text" name="account_type" placeholder="口座の種別" value="{{ old('account_type') }}" required>

                <label for="account_number">口座番号</label>
                <input type="text" name="account_number" placeholder="口座番号" value="{{ old('account_number') }}" required><br>

                <label for="account_name">口座名義人</label>
                <input type="text" name="account_name" placeholder="名前" value="{{ old('account_name') }}" required>

                <label for="account_name_kana">口座名義人カナ</label>
                <input type="text" name="account_name_kana" placeholder="ナマエ" value="{{ old('account_name_kana') }}" required><br>
            </div>

            <div class="regist">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
    <script>
        const citiesData = @json($Cities);
    </script>
    <script src="{{ asset('js/common/city.js') }}"></script>
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