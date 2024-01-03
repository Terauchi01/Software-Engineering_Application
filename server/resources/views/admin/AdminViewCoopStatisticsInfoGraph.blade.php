<!DOCTYPE html>
<html>
<head>
    <title>事業者情報分析</title>
</head>
<body>
    <div><canvas id="chart1"></canvas></div>
    <div><canvas id="chart2"></canvas></div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // グラフ1: 1か月の配達個数
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: @json($name),
                datasets: [{
                    label: '1か月の配達個数',
                    data: @json($month_delivery),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
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
        
        // グラフ2: ドローンの稼働率
        var ctx2 = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($name),
                datasets: [{
                    label: 'ドローンの稼働率',
                    data: @json($ratio),
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
