<!DOCTYPE html>
<html lang="ja">
<head>
    <title>利用者情報分析</title>
    <link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
    <style>
        .field {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>
<body>
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
                
                <button type="button" onclick="location.href='{{ route('admin.adminViewUserStatisticsInfo') }}'">統計情報表示に戻る</button>
                
                <div style="width: 80%; margin:0 auto;"><canvas id="chart1"></canvas></div>
                <div class="field">
                    <div style="width: 45%;"><canvas id="chart2"></canvas></div>
                    <div style="width: 45%;"><canvas id="chart3"></canvas></div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // グラフ1: 累計配達個数
                    var ctx1 = document.getElementById('chart1').getContext('2d');
                    var chart1 = new Chart(ctx1, {
                        type: 'line',
                        data: {
                            labels: @json($month),
                            datasets: [{
                                label: '累計配達個数',
                                data: @json($monthCounts)
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: '累計配達個数'
                                },
                            },
                            scales: { // 軸設定
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: '月'
                                    }
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: '配達個数(万個)'
                                    },
                                },
                            }
                        }
                    });
                </script>
                
                <script>
                    // グラフ2: 配達個数(配送元)
                    var ctx2 = document.getElementById('chart2').getContext('2d');
                    var chart2 = new Chart(ctx2, {
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
                    // グラフ3: 配達個数(配送先)
                    var ctx3 = document.getElementById('chart3').getContext('2d');
                    var chart3 = new Chart(ctx3, {
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
            </div>
        </div>
    </div>
</body>
</html>
