<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>依頼一覧</title>
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
                <p><a href="{{ route('coop.coopDeliveryRequestList') }}">依頼一覧</a></p>
            </div>
            <p><a href="{{ route('coop.coopDroneInfoList') }}">ドローン情報一覧</a></p>        
            <p><a href="{{ route('coop.coopRegisterDrone') }}">ドローン登録</a></p>
            <p><a href="{{ route('coop.coopApplyAdminDroneLend') }}">ドローン貸与申請</a></p>
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
                    <p><h2><font color ="#408A7E"><u> 依頼一覧 </u></font></h2></p>
                    @if(empty($mergedData))
                        <p>依頼が存在しません</p>
                    @else
                        <table class ="coop">
                            <thead>
                                <tr>
                                    <th>依頼番号</th>
                                    <th>送り主情報</th>
                                    <th>受け取り主情報</th>
                                    <th>集荷会社情報</th>
                                    <th>中間配達会社情報</th>
                                    <th>配送会社情報</th>
                                    <th>受領済</th>
                                </tr>
                            </thead>                                    
                            <tbody>
                                    @foreach ($mergedData as $index => $deliveryInfo)
                                        <tr>
                                            <td>{{ $deliveryInfo['id'] }}</td>
                                            <td>{{ $deliveryInfo['user_id'] }}</td>
                                            <td>{{ $deliveryInfo['delivery_destination_id'] }}</td>
                                            <td>{{ $deliveryInfo['collection_company_id'] }}</td>
                                            <td>{{ $deliveryInfo['intermediate_delivery_company_id'] }}</td>
                                            <td>{{ $deliveryInfo['delivery_company_id'] }}</td>
                                            <td><button type="button">
                                                <a href="{{ route('coop.coopDeliveryRequestListDelete', ['id' => $deliveryInfo['id']]) }}">
                                                    <img src="{{ asset('image/img_approval.png') }}" alt="受領" width="20" height="20"></a></button></td>
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
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>