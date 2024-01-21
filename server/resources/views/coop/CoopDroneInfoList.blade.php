<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ドローン情報一覧</title>
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
            <p><a href="{{ route('coop.coopDeliveryRequestList') }}">依頼一覧</a></p>
            <div class="current">
                <p><a href="{{ route('coop.coopDroneInfoList') }}">ドローン情報一覧</a></p>
            </div>
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
                    <p><h2><font color ="#408A7E"><u> ドローン情報一覧 </u></font></h2></p>
                    
                    <select onChange="location.href=this.value;">
                        <option>所有状況を選択</option>
                        @php
                            $uniqueCompanies = collect($mergedData)->unique('possessionOrLoan')->values();
                        @endphp
                        @foreach ($uniqueCompanies as $index => $droneInfo)
                            <option value="{{ route('coop.coopDroneInfoList', ['id' => $droneInfo['possession_or_loan']]) }}">{{ $droneInfo['possessionOrLoan'] }}</option>
                        @endforeach
                    </select>
                    
                    <form action="{{ route('coop.coopDroneInfoList', ['id' => '']) }}" method="GET" style="display: inline;">
                        <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
                    </form>
                    <br><br>
                    @if(empty($mergedData))
                        <p>ドローンが存在しません</p>
                    @else
                        <table class ="coop">
                            <thead>
                                <tr>
                                    <th>ドローン番号</th>
                                    <th>ドローンの種類</th>
                                    <th>稼働状況</th>
                                    <th>所有状況</th>
                                    <th>編集</th>
                                    <th>削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mergedData as $index => $droneInfo)
                                    <tr>
                                        <td>{{ $droneInfo['id'] }}</td>                                   
                                        <td>{{ $droneInfo['drone_type_id'] }}</td>
                                        <td>{{ $droneInfo['drone_status'] }}</td>                           
                                        <td>{{ $droneInfo['possessionOrLoan'] }}</td>
                                        <td><button type="button">
                                            <a href="{{ route('admin.adminEditCoopDroneInfo', ['id' => $droneInfo['id']]) }}">
                                                <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                                        <td><button type="button">
                                            <a href="{{ route('coop.coopDroneInfoListDelete', ['id' => $droneInfo['id']]) }}">
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
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
