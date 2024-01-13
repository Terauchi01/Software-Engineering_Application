adminRegisterAdminDrone
<form action="{{ route('admin.registerDrone') }}" method="POST">
    @csrf

    <label for="name">名前</label>
    <input type="text" name="name" required><br>

    <label for="range">航続距離</label>
    <input type="number" name="range" required><br>

    <label for="loading_weight">搭載重量</label>
    <input type="number" name="loading_weight" required><br>

    <label for="max_time">最大飛行時間</label>
    <input type="number" name="max_time" required><br>

    <label for="number_of_drones">ドローンの数</label>
    <input type="number" name="number_of_drones" required><br>

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