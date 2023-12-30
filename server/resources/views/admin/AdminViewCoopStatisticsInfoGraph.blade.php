<!DOCTYPE html>
<html>
<head>
    <title>事業者情報分析</title>
    <style>
        .field {
            display: flex;
            justify-content:space-around;
        }
    </style>
</head>
<body>
    <div class="field">
        <div style="width: 40%"><canvas id="chart1"></canvas></div>
        <div style="width: 40%"><canvas id="chart2"></canvas></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('chart1').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: '1か月の配達個数',
                    data: @json($data),
                    // backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    // borderColor: 'rgba(75, 192, 192, 1)',
                    // borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: '1か月の配達個数'
                    }
                }
            }
        });
        
        var ctx = document.getElementById('chart2').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'ドローンの稼働率',
                    data: @json($data),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'ドローンの稼働率'
                    }
                }
            }
        });
    </script>
    
    <button type="button" onclick="location.href='{{ route('admin.adminViewCoopStatisticsInfo') }}'">統計情報表示に戻る</button>
</body>
</html>
