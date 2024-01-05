<!DOCTYPE html>
<html>
<head>
    <title>利用者情報分析</title>
    <style>
        .field {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div class="field">
        <div style="width: 600px; height: 600px;"><canvas id="chart1"></canvas></div>
        <div style="width: 600px; height: 600px;"><canvas id="chart2"></canvas></div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // グラフ1: 配達個数(配送元)
        var ctx1 = document.getElementById('chart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: @json($fromPrefectures),
                datasets: [{
                    label: '配達個数(配送元)',
                    data: @json($fromCounts)
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: '配達個数(配送元)'
                    }
                }
            }
        });
    </script>
    
    <script>
        // グラフ2: 配達個数(配送先)
        var ctx2 = document.getElementById('chart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: @json($toPrefectures),
                datasets: [{
                    label: '配達個数(配送先)',
                    data: @json($toCounts)
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: '配達個数(配送先)'
                    }
                }
            }
        });
    </script>

    <button type="button" onclick="location.href='{{ route('admin.adminViewUserStatisticsInfo') }}'">統計情報表示に戻る</button>
</body>
</html>
