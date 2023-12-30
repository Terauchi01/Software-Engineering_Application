<!-- controller: server/app/Http/Controllers/AdminViewCoopListController.php -->
<!-- blade     : server/resources/views/admin/AdminViewCoopList.blade.php -->
<!-- css       : server/public/css/admin/AdminViewCoopList.css -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>事業者閲覧一覧</title>
        <link rel="stylesheet" href="{{ asset('css/admin/AdminViewCoopList.css') }}">
    </head>
    
    <body>
        <div class = "side">
            <div class = "current"><a href = "http://127.0.0.1:8080/admin/viewCoopList">事業者情報管理</a></div>
            <br>
            <a href = "http://127.0.0.1:8080/admin/adminAllocateCoopDeliveryTask">ドローン貸与申請一覧</a>
            <br>
            <a href = "http://127.0.0.1:8080/admin/viewUserList">利用者情報管理</a>
            <br>
            <a href = "http://127.0.0.1:8080/admin/adminViewCoopStatisticsInfo">事業者情報分析</a>
            <br>
            <a href = "http://127.0.0.1:8080/admin/adminViewUserStatisticsInfo">利用者情報分析</a>
            <br>
            <a href = "   http://127.0.0.1:8080/admin/viewUserDeliveryRequestList">宅配依頼一覧</a>
        </div>
        <div class = "main">
            <div class = "coopList"> <!--#408A7E-->
                <p><h2><font color ="#408A7E"><u> 事業者情報管理 </u></font></h2></p>
            </div>
            
            <button type="submit" name="add" class="custom-button"> 絞り込み </button>
            <button type="submit" name="add" class="custom-button">リセット</button>
            
            <p><input type="checkbox" id="checkbox" name="feature_enabled">
                <label for="checkbox">Select all</label></p>
            
            <table class ="coop">
                <thead>
                    <tr>
                        <th></th>
                        <th>事業者番号</th>
                        <th>事業者名</th>
                        <th>事業者代表名</th>
                        <th>所在地</th>
                        <th>先月の支払い状況</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($id as $index => $coopInfo)
                        <tr>
                            <td> <input type="checkbox" id="checkbox" name="1"></td>
                            <td>{{ $id[$index] }}</td>
                            <td>{{ $coop_name[$index] }}</td>
                            <td>{{ $representative_name[$index] }}</td>
                            <td>{{ $coop_locations_list_id[$index] }}</td>
                            <td>{{ $pay_status[$index] }}</td>
                            <td><button type="submit" name="add">編集</button></td>
                            <td><button type="submit" name="add">削除</button></td>
                            <!-- <td><button type="submit" name="add" class="image-button"><img class="button-image" src="img_edit.png">削除</button></td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

