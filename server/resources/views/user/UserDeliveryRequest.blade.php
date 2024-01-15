userRequestDelivery
<form method="POST" action="{{ route('user.deliveryRequest') }}">
    @csrf
<h2>相手型の個人情報</h2>
    <div>
        <label for="user_last_name">姓</label>
        <input type="text" name="user_last_name" required>
    </div>
    <div>
        <label for="user_first_name">名</label>
        <input type="text" name="user_first_name" required>
    </div>
    <div>
        <label for="user_last_name_kana">姓（カナ）</label>
        <input type="text" name="user_last_name_kana" required>
    </div>
    <div>
        <label for="user_first_name_kana">名（カナ）</label>
        <input type="text" name="user_first_name_kana" required>
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
    </div>
    
    <!-- 市区町村のセレクトボックス -->
    <div>
        <label for="city_id">市区町村</label>
        <select id="city" name="city_id" required>
        </select>
    </div>

    <!-- それ以降 -->
    <div>
        <label for="town">町名など</label>
        <input type="text" name="town" required>
    </div>
    
    <div>
        <label for="block">番地</label>
        <input type="text" name="block" required>
    </div>

    <!-- 宅配物 -->
    <label for="item">宅配物</label>
    <input type="text" name="item" required><br>

    <!-- 配達要望日時 -->
    <label for="request_date">配達要望日時</label>
    <input type="datetime-local" name="request_date" required>

    <button type="submit">送信</button>
</form>

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
