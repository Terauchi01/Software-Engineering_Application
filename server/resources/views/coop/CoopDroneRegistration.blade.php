<h2>ドローン登録フォーム</h2>

<form action="{{ route('coop.registerDrone') }}" method="POST">
    @csrf

    <label for="droneTypeId">ドローン種類ID</label>
    <input type="text" id="droneTypeId" name="drone_type_id" required><br>

    <label for="operatingTime">稼働時間</label>
    <input type="text" id="operatingTime" name="operating_time" required><br>

    <label for="purchaseDate">購入時期</label>
    <input type="date" id="purchaseDate" name="purchase_date" required><br>

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