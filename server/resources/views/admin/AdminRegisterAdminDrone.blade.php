<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ドローン登録</title>
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
        <div class="inputs">
            <form action="{{ route('admin.registerDrone') }}" method="POST">
                @csrf
                <h2>ドローン登録フォーム</h2>

                <label for="name">名前</label>
                <input type="text" name="name" placeholder="ドローン名" required><br>

                <label for="range">航続距離</label>
                <input type="number" name="range" required><br>

                <label for="loading_weight">搭載重量</label>
                <input type="number" name="loading_weight" required><br>

                <label for="max_time">最大飛行時間</label>
                <input type="number" name="max_time" required><br>

                <label for="number_of_drones">ドローンの数</label>
                <input type="number" name="number_of_drones" required><br>

                <div class="regist"><button type="submit">登録</button></div>
            </form>
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