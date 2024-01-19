<!DOCTYPE html>
<html lang="ja">
<head>
    <title>事業者情報分析</title>
    <link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
</head>
<body>
    <div class="side">
        <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
        <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
        <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
        <div class="current">
        <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
        </div>
        <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
        <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
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
                
                <button type="button" onclick="location.href='{{ route('admin.adminViewCoopStatisticsInfo') }}'">統計情報表示に戻る</button>
                
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
                                data: @json($month_delivery)
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: '1か月の配達個数'
                                }
                            },
                            scales: { // 軸設定
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: '1か月の配達個数(万個)'
                                    },
                                    ticks: { // 目盛り
                                        stepSize: 1
                                    }
                                },
                            }
                        }
                    });
                    
                    // グラフ2: ドローンの稼働率
                    var ctx2 = document.getElementById('chart2').getContext('2d');
                    var chart2 = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: @json($name2),
                            datasets: [{
                                label: 'ドローンの稼働率',
                                data: @json($ratio)
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'ドローンの稼働率'
                                }
                            },
                            scales: { // 軸設定
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: 'ドローンの稼働率(%)'
                                    }
                                },
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</body>
</html>