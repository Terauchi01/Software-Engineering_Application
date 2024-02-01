<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>利用者会員登録</title>
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
            <form action="{{ route('user.userRegister') }}" method="POST">
                {{ csrf_field() }}
                <div class="inputs">
                    <h2>新規会員登録</h2>
                    <div>
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
                        
                        <label>お客様氏名</label>
                        <input type="text" name="user_last_name" placeholder="姓" required>
                        <input type="text" name="user_first_name" placeholder="名" required><br>
                    </div>

                    <div>
                        <label>お客様氏名カナ</label>
                        <input type="text" name="user_last_name_kana" placeholder="セイ" required>
                        <input type="text" name="user_first_name_kana" placeholder="メイ" required><br>
                    </div>
                    <div>
                        <label>住所</label>
                        <input type="text" name="postal_code" placeholder="郵便番号" required>
                        <div><label for="prefecture_id">都道府県</label>
                            <select id="prefecture" name="prefecture_id" required>
                                @foreach ($Prefecture as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <label>市区町村</label>
                            <select id="city" name="city_id" required></select>
                        </div>
                        <input type="text" name="town" placeholder="市区町村以降の住所" required>
                        <input type="text" name="block" placeholder="建物名">
                    </div>
                    <div class="phone">
                        <label>電話番号</label>
                        <input type="tel" name="phone_number" placeholder="0000000000" size="11" required>
                    </div>

                    <label>メールアドレス</label>
                    <input type="email" name="email_address" placeholder="example@example.com" required><br>

                    <label>パスワード</label>
                    <input type="password" name="password" placeholder="8文字以上32文字以下、英数字" pattern="\w{8,32}" required><br>

                </div>
                <div class="regist"><button type="submit" name="add">上記内容で登録する</button></div>
            </form>
            <a class="toLogin" href="{{ route('user.userLogin') }}">ログイン画面に戻る</a>
        </div>
    </body>

</html>
<script>
 const citiesData = @json($Cities); // コントローラーから渡された市区町村データ
                    function updateCities() {
                        const selectedPrefecture = document.getElementById('prefecture').value;
                        const citiesSelect = document.getElementById('city');

                        // 現在の選択肢をクリア
                        citiesSelect.innerHTML = '';

                        // 対応する市区町村を追加
                        if (selectedPrefecture in citiesData) {
                            // オブジェクトの各プロパティに対して処理を行う
                            for (const id in citiesData[selectedPrefecture]) {
                                if (citiesData[selectedPrefecture].hasOwnProperty(id)) {
                                    const option = document.createElement('option');
                                    option.value = id;
                                    option.text = citiesData[selectedPrefecture][id];
                                    citiesSelect.appendChild(option);
                                }
                            }
                        }
                    }

                    // 都道府県が変更されたときに市区町村を更新
                    document.getElementById('prefecture').addEventListener('change', updateCities);

                    // 初期表示時にも実行
                    updateCities();
</script>
