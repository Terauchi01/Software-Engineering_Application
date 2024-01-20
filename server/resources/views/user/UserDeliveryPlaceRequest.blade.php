<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>宅配場所登録</title>
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
        <form action="{{ route('user.placeRequest') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inputs">
                <h2>宅配場所の登録</h2>

                <!-- 他のフォーム要素 -->
                <label for="image">画像</label>
                <input style="border-width: 0px;" type="file" name="image" accept="image/*" required>

                <div class="regist"><button type="submit">登録</button></div>
            </div>
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