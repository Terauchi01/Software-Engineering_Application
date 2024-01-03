<!DOCTYPE html>
<html>
<head>
    <title>事業者情報分析</title>
</head>
<body>
    <table width="800" border="1" align="center">
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
                <td>{{ $coopName }}</td>
                <td>{{ $month_delivery[$userId] }}</td>
                <td>{{ $ratio[$userId] !== -1 ? $ratio[$userId] * 100 . '%' : 'N/A' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <button type="button" onclick="location.href='{{ route('admin.adminViewCoopStatisticsInfoGraph') }}'">グラフ表示する</button>
</body>
</html>
