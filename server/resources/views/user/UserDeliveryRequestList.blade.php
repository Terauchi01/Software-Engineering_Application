<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>宅配依頼一覧</title>
        <link rel="stylesheet" href="{{ asset('css/coop/CoopList.css') }}">
        <style>
        .current {
            background-color: #ffffff;
            height: 20pt;
            text-align: center;
        }
        </style>
    </head>
    
    <body>    
        <div class="side">
            <div class="current">
                <p><a href="{{ route('user.userDeliveryRequestList') }}">宅配依頼一覧</a></p>
            </div>
            <p><a href="{{ route('user.userDeliveryPlaceRequest') }}">宅配場所登録</a></p>
            <p><a href="{{ route('user.userDeliveryRequest') }}">宅配依頼</a></p>
        </div>
        
        <div class = "content">
            <div class = "header">
                <select onChange="location.href=value;">
                    <option>利用者</option>
                    <option value="{{ route('user.userLogout') }}">ログアウト</option>
                    <option value="{{ route('user.userWithdraw') }}">退会</option>
                </select>                
                <p>user</p> <!-- ここをユーザ名とする -->
            </div>
            
            <div class = "main">
                <div class ="flex-main">                        
                    <p><h2><font color ="#408A7E"><u> 宅配依頼一覧 </u></font></h2></p>
                    
                    <table class ="coop">
                        <thead>
                            <tr>
                                <th>依頼番号</th>
                                <th>商品名</th>
                                <th>送り主</th>
                                <th>受け取り主</th>
                                <th>配達日</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mergedData as $index => $requestInfo)
                                <tr>
                                    <td>{{ $requestInfo['id'] }}</td>                        
                                    <td>{{ $requestInfo['item'] }}</td>
                                    <td>{{ $requestInfo['user_id'] }}</td>
                                    <td>{{ $requestInfo['delivery_destination_id'] }}</td>
                                    <td>{{ $requestInfo['delivery_date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>                                   
                        
                        <script>
                        document.getElementById('masterCheckbox').addEventListener('change', function() {
                            var masterCheckbox = this;
                            var itemCheckboxes = document.querySelectorAll('.itemCheckbox');
                            
                            itemCheckboxes.forEach(function(itemCheckbox) {
                                itemCheckbox.checked = masterCheckbox.checked;
                            });
                        });
                        
                         // 各行のチェックボックスに対するイベントリスナーも追加する場合
                        document.querySelectorAll('.itemCheckbox').forEach(function(itemCheckbox) {
                            itemCheckbox.addEventListener('change', function() {
                                var allChecked = true;
                                document.querySelectorAll('.itemCheckbox').forEach(function(checkbox) {
                                    if (!checkbox.checked) {
                                        allChecked = false;
                                    }
                                });
                                document.getElementById('masterCheckbox').checked = allChecked;
                            });
                        });                                                 
                        </script>                            
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

