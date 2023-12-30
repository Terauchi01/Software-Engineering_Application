<!-- adminViewCoopStatisticsInfo test
@foreach ($data as $key => $value)
        <p>{{ $value }}</p>
@endforeach -->
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
        </tbody>
    </table>

    <button type="button" onclick="location.href='{{ route('admin.adminViewCoopStatisticsInfoGraph') }}'">グラフ表示する</button>
</body>
</html>
