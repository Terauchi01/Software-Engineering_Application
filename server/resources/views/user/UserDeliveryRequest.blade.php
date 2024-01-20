<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>宅配依頼</title>
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
        <form method="POST" action="{{ route('user.deliveryRequest') }}">
            @csrf
            <div class="inputs">
                <h2>配送相手の個人情報(相手もこのシステムにユーザ登録している必要があります)</h2>
                <div class="name">
                    <label for="user_name">お名前</label>
                    <input type="text" name="user_last_name" placeholder="性" required>
                    <input type="text" name="user_first_name" placeholder="名" required>
                </div>

                <div class="name">
                    <label for="user_name_kana">お名前(カナ)</label>
                    <input type="text" name="user_last_name_kana" placeholder="セイ" required>
                    <input type="text" name="user_first_name_kana" placeholder="メイ" required>
                </div>

                <!-- 郵便番号 -->
                <div>
                    <label for="postal_code">郵便番号</label>
                    <input type="text" name="postal_code" required>
                </div>

                <!-- 都道府県id -->
                <div>
                    <label for="prefecture_id">都道府県</label>
                    <select id="prefecture" name="prefecture_id" required>
                        @foreach ($Prefecture as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <!-- 市区町村のセレクトボックス -->
                    <label for="city_id">市区町村</label>
                    <select id="city" name="city_id" required>
                    </select>
                </div>

                <!-- それ以降 -->
                <div>
                    <label for="town">町名・番地</label>
                    <input type="text" name="town" required>
                    <label for="block">建物名</label>
                    <input type="text" name="block" required>
                </div>

                <!-- 宅配物 -->
                <label for="item">宅配物</label>
                <input type="text" name="item" required><br>

                <!-- 配達要望日時 -->
                <label for="request_date">配達要望日時</label>
                <input type="datetime-local" name="request_date" required>
            </div>
            <div class="regist"><button type="submit">送信</button></div>
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