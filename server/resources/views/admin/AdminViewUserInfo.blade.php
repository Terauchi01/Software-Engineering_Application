<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="{{ asset('/css/admin/AdminViewUserInfo.css') }}">
    </head>
    <body>
        <nav class="side">
            <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
            <div class="current">
                <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            </div>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
        </nav>
        <div class="userInfo">
            <p class="information"><h2><font color ="#408A7E"><u>利用者情報詳細</u></font></h2></p>
            <p class="userName">{{ $userName }}</p>
            @if($userId !== null)
            <p class="userId">ID : {{ $userId }}</p>
            <form action="{{ route('admin.adminEditUserInfo',["id"=>$userId]) }}" method="GET">
            <input type="hidden" name="id" value="{{ $userId }}">
            <button type="submit" class="edit">編集する</button>
            </form>
            <table>
                <tr>
                    <th>メールアドレス</th>
                    <th>{{ $data['email'] }}</th>
                </tr>
                <tr>
                    <th>パスワード</th>
                    <th>{{ $data['password'] }}</th>
                </tr>
                <tr>
                    <th>住所</th>
                    <th>{{ $data['address'] }}</th>
                </tr>
                <tr>
                    <th>利用者名</th>
                    <th>{{ $data['name'] }}</th>
                </tr>
                <tr>
                    <th>利用者名カナ</th>
                    <th>{{ $data['kanaName'] }}</th>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <th>{{ $data['phone_number'] }}</th>
                </tr>
            </table>
            @endif
        </div>
        <div class = "header">
            <select onChange="location.href=value;">
                <option>管理者</option>
                <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
            </select>
            <p>admin</p> <!-- ここをユーザ名とする -->
        </div>
    </body>
</html>
