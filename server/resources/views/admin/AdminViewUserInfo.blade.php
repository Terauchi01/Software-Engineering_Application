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
            <p class="information">利用者詳細情報</p>
            <p class="userName">{{ $userName }}</p>
            <p class="userId">{{ $userId }}</p>
            <form action="{{ route('admin.adminEditUserInfo') }}" method="POST">
                <button type="submit" name="id" value="{{ $userId }}" class="edit">編集する</button>
            </form>
            
            <table>
                <tr>
                    <th>メールアドレス</th>
                    <th>{{ $data['email'] }}</th>
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
            </table>
        </div>
    </body>
</html>
