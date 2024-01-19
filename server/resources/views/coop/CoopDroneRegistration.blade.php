<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ドローン登録</title>
    <link rel="stylesheet" href="{{ asset('css/coop/CoopRegistrationRequest.css') }}">
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
        <div class="inputs">
            <form action="{{ route('coop.registerDrone') }}" method="POST">
                @csrf
                <h2>ドローン登録フォーム</h2>

                <label for="droneTypeId">ドローン種類ID</label>
                <input type="text" id="droneTypeId" name="drone_type_id" required><br>

                <label for="operatingTime">稼働時間</label>
                <input type="text" id="operatingTime" name="operating_time" required><br>

                <label for="purchaseDate">購入時期</label>
                <input type="date" id="purchaseDate" name="purchase_date" required><br>
            </form>
            <div class="regist"><button type="submit">登録</button></div>
        </div>
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