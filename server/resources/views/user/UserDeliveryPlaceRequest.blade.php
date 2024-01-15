UserDeliveryPlaceRequest
<form action="{{ route('user.placeRequest') }}" method="post" enctype="multipart/form-data">
    @csrf

    <!-- 他のフォーム要素 -->

    <label for="image">画像</label>
    <input type="file" name="image" accept="image/*" required>

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
