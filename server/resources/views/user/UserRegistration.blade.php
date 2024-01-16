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
                        <th><div><label for="prefecture_id">都道府県</label>
                        <select id="prefecture" name="prefecture_id" required>
                            @foreach ($Prefecture as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select></div></th>
                        {{-- <th><input type="text" name="prefecture" placeholder="都道府県" required></th> --}}
                        <th><div>
                            <label for="city_id">市区町村</label>
                            <select id="city" name="city_id" required>
                            </select>
                        </div></th>
                        {{-- <th><input type="text" name="city" placeholder="市区町村" requred></th> --}}
                        <th><input type="text" name="town" placeholder="町名・番地"></th>
                        <th><input type="text" name="block" placeholder="建物名"></th>
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