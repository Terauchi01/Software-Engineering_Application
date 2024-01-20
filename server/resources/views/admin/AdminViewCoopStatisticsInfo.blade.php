<!DOCTYPE html>
<html lang="ja">
<head>
    <title>事業者情報分析</title>
    <link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
</head>
<body>
    <div class="side">
        <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
        <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a></p>
        <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
        <div class="current">
        <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
        </div>
        <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
        <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
        <p><a href="{{ route('admin.adminViewDroneType') }}">ドローンタイプ　一覧</a></p>
        <p><a href="{{ route('admin.adminViewCoopDeliveryRequestList') }}">事業者宅配一覧</a></p>
        <p><a href="{{ route('admin.adminViewUserDeliveryRequestList') }}">利用者宅配一覧</a></p>
    </div>
    
    <div class="content">
        <div class = "header">
            <select onChange="location.href=value;">
                <option>管理者</option>
                <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
            </select>
            <p>admin</p> <!-- ここをユーザ名とする -->
        </div>
            
        <div class="main">
            <div class="flex-main">
                <p><h2><font color="#408A7E"><u> 事業者情報分析 </u></font></h2></p>
                
                <button type="button" class="custom-button" onclick="location.href='{{ route('admin.adminViewCoopStatisticsInfoGraph') }}'">グラフ表示する</button>
                
                <table width="800" border="1" align="center"  bgcolor="ffffe0">
                    <thead>
                        <tr>
                            <th>事業者名</th>
                            <th>1か月の配達個数</th>
                            <th>ドローンの稼働率</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($name as $userId => $coopName)
                        <tr>
                            <td align="center">{{ $coopName }}</td>
                            <td align="center">{{ $month_delivery[$userId] ? $month_delivery[$userId] . '万個' : $month_delivery[$userId] . '個' }}</td>
                            <td align="center">{{ $ratio[$userId] !== -1 ? number_format($ratio[$userId], 3) * 100 . '%' : 'N/A' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
