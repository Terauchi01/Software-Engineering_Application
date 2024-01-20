<!DOCTYPE html>
<html lang="ja">

<head>
    <title>ドローン情報編集</title>
    <link rel="stylesheet" href="{{ asset('/css/common/EditInfo.css') }}">
</head>

<body>
    <div class="header">
        <select onChange="location.href=value;">
            <option>管理者</option>
            <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
        </select>
        <p>admin</p> <!-- ここをユーザ名とする -->
    </div>

    <nav class="side">
        <div class="current">
            <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
        </div>
        <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
        <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
        <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
        <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
        <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
    </nav>

    <div class="info">
        <h2><u>ドローン情報編集</u></h2>

        <p class="name">{{ $Drone->name }}</p>
        @if($Drone->id !== null)
        <p class="currentID">ID : {{ $Drone->id }}</p>

        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif

        <form method="post" action="{{ route('admin.editDrone', $Drone->id) }}">
            @csrf

            <table>
                <tr>
                    <th>ドローンの数</th>
                    <th>
                        <div class="left"><input type="number" name="number_of_drones" class="form-control" value="{{ old('number_of_drones', $Drone->number_of_drones) }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>ドローン名</th>
                    <th>
                        <div class="left"><input type="text" name="name" class="form-control" value="{{ old('name', $Drone->name) }}" maxlength="100" required></div>
                    </th>
                </tr>

                <tr>
                    <th>航続距離</th>
                    <th>
                        <div class="left"><input type="number" name="range" class="form-control" value="{{ old('range', $Drone->range) }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>搭載重量</th>
                    <th>
                        <div class="left"><input type="number" name="loading_weight" class="form-control" value="{{ old('loading_weight', $Drone->loading_weight) }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>最大飛行時間</th>
                    <th>
                        <div class="left"><input type="number" name="max_time" class="form-control" value="{{ old('max_time', $Drone->max_time) }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>貸し出し数</th>
                    <th>
                        <div class="left"><input type="number" name="lend_drones_sum" class="form-control" value="{{ old('lend_drones_sum', $Drone->lend_drones_sum) }}" required></div>
                    </th>
                </tr>
            </table>

            <input type="hidden" name="id" value="{{ $Drone->id }}">

            <div class="confirm">
                <button type="submit" class="btn btn-primary">上記の内容で更新する</button>
            </div>
        </form>
        @endif
    </div>
</body>

</html>