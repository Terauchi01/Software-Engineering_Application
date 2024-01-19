coopRegistrationRequest
<script>const citiesData = @json($Cities);</script>
<script src="{{ asset('js/common/city.js') }}"></script>
<form action="{{ route('coop.coopRegister') }}" method="POST">
    @csrf
    <h2>企業情報</h2><br>
    <label for="email_address">メールアドレス</label>
    <input type="email" name="email_address" required><br>

    <label for="password">パスワード</label>
    <input type="password" name="password" required><br>

    <label for="coop_name">事業者名</label>
    <input type="text" name="coop_name" required><br>

    <label for="representative_last_name">事業代表者姓</label>
    <input type="text" name="representative_last_name" required><br>

    <label for="representative_first_name">事業代表者名</label>
    <input type="text" name="representative_first_name" required><br>

    <label for="representative_last_name_kana">姓カナ</label>
    <input type="text" name="representative_last_name_kana" required><br>

    <label for="representative_first_name_kana">名カナ</label>
    <input type="text" name="representative_first_name_kana" required><br>

    <label for="employees">従業員数</label>
    <input type="text" name="employees" required><br>

    <label for="phone_number">電話番号</label>
    <input type="text" name="phone_number" required><br>

    <label for="land_or_air">陸か空か</label>
    <input type="text" name="land_or_air" required><br>

    <h2>事業所情報</h2><br>
    <label for="office_name">事業所名</label>
    <input type="text" name="office_name" required><br>
    <label for="postal_code"></label>
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
    以下企業情報の代表者名と異なる場合のみ記載して下さい<br>
    <label for="representative_last_name">事業所代表者姓</label>
    <input type="text" name="office_representative_last_name" ><br>

    <label for="representative_first_name">事業所代表者名</label>
    <input type="text" name="office_representative_first_name" ><br>

    <label for="representative_last_name_kana">姓カナ</label>
    <input type="text" name="office_representative_last_name_kana" ><br>

    <label for="representative_first_name_kana">名カナ</label>
    <input type="text" name="office_representative_first_name_kana" ><br>

    <h2>免許情報</h2><br>
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

    <h2>銀行情報</h2><br>
    <label for="bank_id">銀行名</label>
    <input type="text" name="bank_id" required><br>

    <label for="branch_id">支店名</label>
    <input type="text" name="branch_id" required><br>

    <label for="account_type">口座の種別</label>
    <input type="text" name="account_type" required><br>

    <label for="account_number">口座番号</label>
    <input type="text" name="account_number" required><br>

    <label for="account_name">口座の持ち主の名前</label>
    <input type="text" name="account_name" required><br>

    <label for="account_name_kana">口座持ち主のカナ</label>
    <input type="text" name="account_name_kana" required><br>

    <button type="submit">登録</button>
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