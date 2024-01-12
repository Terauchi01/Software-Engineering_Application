<!-- controller: server/app/Http/Controllers/AdminAllocateCoopDeliveryTask.php -->
<!-- blade     : server/resources/views/admin/AdminAllocateCoopDeliveryTask.php -->
<!-- css       : server/public/css/admin/AdminList.css -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>宅配依頼一覧</title>
        <link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
    </head>
    
    <body>
        <div class = "all">
            <div class="side">
                <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>         
                <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
                <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>                
                <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
                <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>

                <div class="current">
                    <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
                </div>
            </div>           
            <div class = "content">
                <div class = "header">
                    <div class="select-wrapper">
                        <select class="select" id = "selected">
                            <option value="1">管理者</option>
                            <option value="2" onclick="logout()">ログアウト</option>
                        </select>
                        <script>
                         function logout(option){
                             if (confirm('ログアウトしますか？')) {
                                 alert('ログアウトされました');
                             }
                         }
                        </script>
                    </div>
                </div>
                <div class = "main">
                    <div class ="flex-main">
                        <div class = "coopList"> <!--#408A7E-->
                            <p><h2><font color ="#408A7E"><u> 宅配依頼一覧 </u></font></h2></p>
                        </div>
                        
                        <button type="submit" name="add" id="filterButton" class="custom-button">承諾</button>
                        <button type="submit" name="add" id="resetButton" class="custom-button">却下</button>
                        
                        <script>
                         document.getElementById('filterButton').addEventListener('click', function() {
                             alert('承諾ボタンがクリックされました。');
                         });
                         
                         document.getElementById('resetButton').addEventListener('click', function() {
                             alert('却下ボタンがクリックされました。');
                         });
                        </script>
                        
                        
                        <p>
                            <input type="checkbox" id="masterCheckbox" name="feature_enabled">
                            <label for="masterCheckbox">Select all</label>
                        </p>
                        
                        
                        <table class ="coop">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>依頼番号</th>
                                    <th>送り主情報</th>
                                    <th>受け取り情報</th>
                                    <th>担当者事業者名</th>
                                    <th>編集</th>
                                    <th>削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($id as $index => $coopInfo)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="itemCheckbox" id="checkbox{{$index}}" name="selectedCoops[]" value="{{ $coopInfo }}">
                                        </td>
                                        <td>{{ $id[$index] }}</td>
                                        <td>{{ $send_address[$index] }}</td>
                                        <td>{{ $receive_address[$index] }}</td>
                                        <td>{{ $coop[$index] }}</td>
                                        <td><button type="button" onclick="editCoop({{ $id[$index] }})">
                                            <img src="{{ asset('image/img_edit.png') }}" alt="削除" width="20" height="20">
                                        </button></td>
                                        <td><button type="button" onclick="confirmDelete({{ $id[$index] }})">
                                            <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20">
                                        </button></td>
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
                             
                             function editCoop(coopId) {
                                 var confirmation = confirm('編集しますか？ Coop ID: ' + coopId);
                                 
                                 if (confirmation) {
                                     alert('編集処理を実行します。Coop ID: ' + coopId);
                                 }
                             }
                             
                             function confirmDelete(coopId) {
                                 if (confirm('本当に削除しますか？')) {
                                     alert('削除ボタンがクリックされました。Coop ID: ' + coopId);
                                 }
                             }
                            </script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
