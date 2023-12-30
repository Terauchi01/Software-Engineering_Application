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
            <div class = "current"><p>事業者情報管理</p></div>
            <p>ドローン貸与申請一覧</p>
            <p>利用者情報管理</p>
            <p>事業者情報分析</p>
            <p>利用者情報分析</p>
            <p>宅配依頼一覧</p>
        </div>
        <div class = "main">
            <div class = "coopList"> <!--#408A7E-->
                <p><h2><font color ="#408A7E"><u> 事業者情報管理 </u></font></h2></p>
            </div>
            
            <button type="submit" name="add" id="filterButton" class="custom-button">絞り込み</button>
            <button type="submit" name="add" id="resetButton" class="custom-button">リセット</button>

            <script>
             document.getElementById('filterButton').addEventListener('click', function() {
                 alert('絞り込みボタンがクリックされました。');
             });

             document.getElementById('resetButton').addEventListener('click', function() {
                 alert('リセットボタンがクリックされました。');
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
                            <td>
                                <input type="checkbox" class="itemCheckbox" id="checkbox{{$index}}" name="selectedCoops[]" value="{{ $coopInfo }}">
                            </td>
                            <td>{{ $id[$index] }}</td>
                            <td>{{ $coop_name[$index] }}</td>
                            <td>{{ $representative_name[$index] }}</td>
                            <td>{{ $coop_locations_list_id[$index] }}</td>
                            <td>{{ $pay_status[$index] }}</td>
                            <td><button type="button" onclick="editCoop({{ $id[$index] }})">編集</button></td>
                            <td><button type="button" onclick="confirmDelete({{ $id[$index] }})">削除</button></td>
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
    </body>
</html>

