<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>子アカウント一覧</title>
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
            <p><a href="{{ route('coop.coopViewUserDeliveryRequestList') }}">依頼一覧</a></p>
            <p><a href="{{ route('coop.coopDroneInfoList') }}">所持ドローン</a></p>        
            <p><a href="{{ route('coop.coopRegisterDrone') }}">ドローン登録</a></p>
            <div class="current">
                <p><a href="{{ route('coop.coopViewChildCoopAccountList') }}">子アカウント一覧</a></p>
            </div>
            <p><a href="{{ route('coop.coopPublishChildCoopAccount') }}">子アカウント発行</a></p>
            <p><a href="{{ route('coop.coopApplyAdminDroneLend') }}">ドローン貸与申請</a></p>
            <p><a href="{{ route('coop.coopEditCoopInfo') }}">事業者情報編集</a></p>
        </div>
        
        <div class = "content">
            <div class = "header">
                <select onChange="location.href=value;">
                    <option>事業者</option>
                    <option value="{{ route('coop.coopLogout') }}">ログアウト</option>
                    <option value="{{ route('coop.coopwithdraw') }}">退会</option>
                </select>                
                <p>coop</p> <!-- ここをユーザ名とする -->
            </div>
            
            <div class = "main">
                <div class ="flex-main">                        
                    <p><h2><font color ="#408A7E"><u> 子アカウント一覧 </u></font></h2></p>
                    
                    <button id="filterButton" class="custom-button">絞り込み</button>
                    
                    <p>
                        <input type="checkbox" id="masterCheckbox" name="feature_enabled">
                        <label for="masterCheckbox">Select all</label>
                    </p>
                    
                    
                    <table class ="coop">
                        <thead>
                            <tr>
                                <th></th>
                                <th>子アカウント番号</th>
                                <th>子アカウント名</th>
                                <th>メール</th>
                                <th>権限</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>                                    
                        <tbody>
                            @foreach ($mergedData as $index => $childInfo)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="itemCheckbox" id="checkbox{{$childInfo['id']}}" name="selectedCoops[]" value="{{ $childInfo['id'] }}">
                                    </td>
                                    <td>{{ $childInfo['id'] }}</td>
                                    <td><a href="{{ route('admin.adminViewCoopInfo', ['id' => $childInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $childInfo['coop_name'] }}</a></td>
                                    <td>{{ $childInfo['email_address'] }}</td>
                                    <td>{{ $childInfo['child_status'] }}</td>
                                    <td><button type="button">
                                        <a href="{{ route('admin.adminEditCoopInfo', ['id' => $childInfo['id']]) }}">
                                            <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                                    <td><button type="button">
                                        <a href="{{ route('admin.adminViewCoopListDelete', ['id' => $childInfo['id']]) }}">
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

