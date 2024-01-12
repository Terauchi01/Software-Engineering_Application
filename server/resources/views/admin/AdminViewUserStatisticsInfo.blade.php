<!DOCTYPE html>
<html>
<head>
    <title>利用者情報分析</title>
    <link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
</head>
<body>
    <div class="all">
        <div class="side">
            <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <div class="current">
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            </div>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
        </div>
        <div class="space"></div>
        <div class="content">
            <div class="header">
                <div class="select-wrapper">
                    <select class="select" id = "selected">
                        <option value="1">管理者</option>
                        <option value="2" onclick="logout()">ログアウト</option>
                    </select>
                    <script>
                        function logout(option){
                            if (confirm('ログアウトしますか？')) {
                                alert('ログアウトされました');
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="main">
                <div class="flex-main">
                    <p><h2><font color="#408A7E"><u> 利用者情報分析 </u></font></h2></p>
                    <table border="1" align="center">
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
                    <table border="1" align="center">
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
                                    <td align="center">{{ isset($toCounts[$prefecture->id]) ? $toCounts[$prefecture->id] . '万個' : 0 }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <button type="button" onclick="location.href='{{ route('admin.AdminViewUserStatisticsInfoGraph') }}'">グラフ表示する</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
