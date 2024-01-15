<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>宅配依頼一覧(送達)</title>
        <link rel="stylesheet" href="{{ asset('css/coop/CoopList.css') }}">
        <style>
         .current {
             background-color: #ffffff;
             height: 40pt;
             text-align: center;
         }
        </style>
    </head>
    
    <body>    
        <div class="side">
            <div class="current">
                <p><a href="{{ route('user.userDeliveryRequestList') }}">宅配依頼一覧(送達)</a></p>
            </div>
            <p><a href="{{ route('user.userDeliveryPlaceRequest') }}">宅配場所登録</a></p>
            <p><a href="{{ route('user.userDeliveryRequest') }}">宅配依頼</a></p>                
            <p><a href="{{ route('user.userRegisterFavorites') }}">お気に入り登録</a></p>
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
                    <p><h2><font color ="#408A7E"><u> 宅配依頼一覧(送達) </u></font></h2></p>
                    
                    <button id="filterButton" class="custom-button">絞り込み</button>
                    
                    <p>
                        <input type="checkbox" id="masterCheckbox" name="feature_enabled">
                        <label for="masterCheckbox">Select all</label>
                    </p>
                    
                    
                    <table class ="coop">
                        <thead>
                            <tr>
                                <th></th>
                                <th>依頼番号</th>
                                <th>商品名</th>
                                <th>送り先</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mergedData as $index => $requestInfo)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="itemCheckbox" id="checkbox{{$requestInfo['id']}}" name="selectedCoops[]" value="{{ $requestInfo['id'] }}">
                                    </td>
                                    <td>{{ $requestInfo['id'] }}</td>                        
                                    <td>{{ $requestInfo['delivery_status'] }}</td>
                                    <td>{{ $requestInfo['delivery_destination_id'] }}</td>                
                                    <td><button type="button">
                                        <a href="{{ route('user.userDeliveryRequestListDelete', ['id' => $requestInfo['id']]) }}">
                                            <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
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

