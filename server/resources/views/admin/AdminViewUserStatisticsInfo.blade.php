<!DOCTYPE html>
<html>
<head>
    <title>利用者情報分析</title>
</head>
<body>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="150">累計配達個数</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">{{ $count }}万個</td>
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
    
    <button type="button" onclick="location.href='{{ route('admin.adminViewUserStatisticsInfoGraph') }}'">グラフ表示する</button>
</body>
</html>
