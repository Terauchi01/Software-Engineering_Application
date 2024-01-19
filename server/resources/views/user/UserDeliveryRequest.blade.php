userRequestDelivery
<script>
    const citiesData = @json($Cities);
</script>
<form method="POST" action="{{ route('user.deliveryRequest') }}">
    @csrf
<h2>配送相手の個人情報(相手もこのシステムにユーザ登録している必要があります)</h2>
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
        <label for="town">町名・番地</label>
        <input type="text" name="town" required>
    </div>
    
    <div>
        <label for="block">建物名</label>
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
<script src="{{ asset('js/common/city.js') }}"></script>
