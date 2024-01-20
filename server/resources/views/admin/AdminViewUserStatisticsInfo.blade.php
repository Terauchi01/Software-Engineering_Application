<!DOCTYPE html>
<html lang="ja">
<head>
    <title>利用者情報分析</title>
    <link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
</head>
<body>
    <div class="side">
        <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
        <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a></p>
        <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
        <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
        <div class="current">
        <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
        </div>
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
                <p><h2><font color="#408A7E"><u> 利用者情報分析 </u></font></h2></p>
                
                <button type="button" class="custom-button" onclick="location.href='{{ route('admin.adminViewUserStatisticsInfoGraph') }}'">グラフ表示する</button>
                
                <table border="1" align="center" bgcolor="#fff0f5">
                    <thead>
                        <tr>
                            <th width="150">累計配達個数</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center">{{ $sum }}万個</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table border="1" align="center" bgcolor="#e0ffff">
                    <thead>
                        <tr>
                            <th width="150">都道府県</th>
                            <th width="180">配達個数(配送元)</th>
                            <th width="180">配達個数(配送先)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Prefecture as $prefecture)
                            <tr>
                                <td align="center">{{ $prefecture->name }}</td>
                                <td align="center">{{ isset($fromCounts[$prefecture->id]) ? $fromCounts[$prefecture->id] . '万個' : 0 }}</td>
                                <td align="center">{{ isset($toCounts[$prefecture->id]) ? $toCounts[$prefecture->id] . '万個' : 0 . '個'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
