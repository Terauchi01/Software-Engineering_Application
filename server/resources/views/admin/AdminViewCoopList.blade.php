<!-- controller: server/app/Http/Controllers/AdminViewCoopListController.php -->
<!-- blade     : server/resources/views/admin/AdminViewCoopList.blade.php -->
<!-- css       : server/public/css/admin/AdminViewCoopList.css -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>事業者閲覧一覧</title>
        <link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
        <script src="{{ asset('js/admin/delete.js') }}"></script>
        <style>
         .current {
             background-color: #ffffff;
             height: 20pt;
             text-align: center;
         }
         #modal {
             display: none;
             position: fixed;
             top: 0;
             left: 0;
             width: 100%;
             height: 100%;
             background-color: rgba(0, 0, 0, 0.5);
             justify-content: center;
             align-items: center;
         }

         #modal-content {
             background-color: #fff;
             padding: 20px;
             border-radius: 5px;
         }

         /* チェックボックスとボタンのスタイル */
         label {
             display: inline-block;
             margin-bottom: 10px;
         }

         #applyFilterButton {
             margin-top: 10px; /* 絞り込みボタンの上の余白を調整 */
         }
        </style>
    </head>
    
    <body>    
        <div class="side">
            <div class="current">
                <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            </div>
            <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
            <p><a href="{{ route('admin.adminViewDroneType') }}">ドローンタイプ　一覧</a></p>
            <p><a href="{{ route('admin.adminViewCoopDeliveryRequestList') }}">事業者宅配一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserDeliveryRequestList') }}">利用者宅配一覧</a></p>
        </div>
        
        <div class = "content">
            <div class = "header">
                <select onChange="location.href=value;">
                    <option>管理者</option>
                    <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
                </select>
                <p>admin</p> <!-- ここをユーザ名とする -->
            </div>
            
            <div class = "main">
                <div class ="flex-main">                        
                    <p><h2><font color ="#408A7E"><u> 事業者情報管理 </u></font></h2></p>                            
                    
                    <button id="filterButton" class="custom-button">絞り込み</button>
                    <!-- <select>
                         <option>選択</option>                        
                         @foreach ($mergedData as $index => $coopInfo)
                         <option> {{ $coopInfo['coop_locations'] }}</option>                      
                         @endforeach
                         </select> -->
                    <!-- <button type="submit" name="add" id="resetButton" class="custom-button">リセット</button> -->
                    <!-- モーダルダイアログ -->
                    <div id="modal">
                        <div id="modal-content">
                            <h3>都道府県を選択してください</h3>
                            <!-- 47都道府県のリスト -->
                            <div id="prefectureList">
                                <label><input type="checkbox" name="prefecture" value="北海道">北海道</label>   
                                <label><input type="checkbox" name="prefecture" value="青森">青森</label>
                                <label><input type="checkbox" name="prefecture" value="岩手">岩手</label>
                                <label><input type="checkbox" name="prefecture" value="宮城">宮城</label>
                                <label><input type="checkbox" name="prefecture" value="秋田">秋田</label>
                                <label><input type="checkbox" name="prefecture" value="山形">山形</label>
                                <label><input type="checkbox" name="prefecture" value="福島">福島</label>
                                <label><input type="checkbox" name="prefecture" value="茨城">茨城</label>
                                <label><input type="checkbox" name="prefecture" value="栃木">栃木</label>
                                <label><input type="checkbox" name="prefecture" value="群馬">群馬</label>
                                <label><input type="checkbox" name="prefecture" value="埼玉">埼玉</label>
                                <label><input type="checkbox" name="prefecture" value="千葉">千葉</label>
                                <label><input type="checkbox" name="prefecture" value="東京">東京</label>
                                <label><input type="checkbox" name="prefecture" value="神奈川">神奈川</label>
                                <label><input type="checkbox" name="prefecture" value="新潟">新潟</label>
                                <label><input type="checkbox" name="prefecture" value="富山">富山</label>
                                <label><input type="checkbox" name="prefecture" value="石川">石川</label>
                                <label><input type="checkbox" name="prefecture" value="福井">福井</label>
                                <label><input type="checkbox" name="prefecture" value="山梨">山梨</label>
                                <label><input type="checkbox" name="prefecture" value="長野">長野</label>
                                <label><input type="checkbox" name="prefecture" value="岐阜">岐阜</label>
                                <label><input type="checkbox" name="prefecture" value="静岡">静岡</label>
                                <label><input type="checkbox" name="prefecture" value="愛知">愛知</label>
                                <label><input type="checkbox" name="prefecture" value="三重">三重</label>
                                <label><input type="checkbox" name="prefecture" value="滋賀">滋賀</label>
                                <label><input type="checkbox" name="prefecture" value="京都">京都</label>
                                <label><input type="checkbox" name="prefecture" value="大阪">大阪</label>
                                <label><input type="checkbox" name="prefecture" value="兵庫">兵庫</label>
                                <label><input type="checkbox" name="prefecture" value="奈良">奈良</label>
                                <label><input type="checkbox" name="prefecture" value="和歌山">和歌山</label>
                                <label><input type="checkbox" name="prefecture" value="鳥取">鳥取</label>
                                <label><input type="checkbox" name="prefecture" value="島根">島根</label>
                                <label><input type="checkbox" name="prefecture" value="岡山">岡山</label>
                                <label><input type="checkbox" name="prefecture" value="広島">広島</label>
                                <label><input type="checkbox" name="prefecture" value="山口">山口</label>
                                <label><input type="checkbox" name="prefecture" value="徳島">徳島</label>
                                <label><input type="checkbox" name="prefecture" value="香川">香川</label>
                                <label><input type="checkbox" name="prefecture" value="愛媛">愛媛</label>
                                <label><input type="checkbox" name="prefecture" value="高知">高知</label>
                                <label><input type="checkbox" name="prefecture" value="福岡">福岡</label>
                                <label><input type="checkbox" name="prefecture" value="佐賀">佐賀</label>
                                <label><input type="checkbox" name="prefecture" value="長崎">長崎</label>
                                <label><input type="checkbox" name="prefecture" value="熊本">熊本</label>
                                <label><input type="checkbox" name="prefecture" value="大分">大分</label>
                                <label><input type="checkbox" name="prefecture" value="宮崎">宮崎</label>
                                <label><input type="checkbox" name="prefecture" value="鹿児島">鹿児島</label>
                                <label><input type="checkbox" name="prefecture" value="沖縄">沖縄</label>
                            </div>
                            <!-- 絞り込みボタン -->
                            <button id="applyFilterButton">絞り込み</button>
                        </div>
                    </div>
                    
                    <script>
                     // 絞り込みボタンがクリックされたらモーダルを表示
                     document.getElementById('filterButton').addEventListener('click', function() {
                         document.getElementById('modal').style.display = 'flex';
                     });

                     // 絞り込みボタン（モーダル内）がクリックされたら処理を実行
                     document.getElementById('applyFilterButton').addEventListener('click', function() {
                         // チェックされた都道府県を取得
                         var selectedPrefectures = [];
                         var checkboxes = document.getElementsByName('prefecture');
                         checkboxes.forEach(function(checkbox) {
                             if (checkbox.checked) {
                                 selectedPrefectures.push(checkbox.value);
                             }
                         });

                         // 選択された都道府県を表示（ここではアラートで表示
                         /* @foreach ($mergedData as $index => $coopInfo)
                            {{ $coopInfo['coop_locations'] }}                      
                            @endforeach */
                         alert('選択された都道府県: ' + selectedPrefectures.join(', '));
                         // モーダルを非表示にする
                         document.getElementById('modal').style.display = 'none';
                     });
                    </script>


                    &nbsp;
                    <button type="submit" name="add" id="resetButton" class="custom-button">リセット</button>
                    
                    <script>
                     
                     document.getElementById('resetButton').addEventListener('click', function() {
                         alert('リセットボタンがクリックされました。');
                     });
                    </script>

                    &nbsp;
                    <button id="deleteButton" class="custom-button">チェックした項目を削除</button>

                    <div id="selectedId"></div>
                    <div id="selectedIdsDisplay"></div>

















                    
                    
                    <input type="hidden" id="url" value="{{ route('admin.deleteAll') }}">
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <meta name="csrf-token" content="{{ csrf_token() }}">





                    





                    
                    <div id="deleteArea">
                        

                        // 配列の初期化
                        $data = [];
                        
                        // 修正後のコード
                        @foreach ($mergedData as $index => $coopInfo)
                            @if (isset($coopInfo['selectedIds']))
                                <a href="{{ route('admin.adminViewCoopListDelete', ['id' => $coopInfo['selectedIds']]) }}"></a>
                            @endif
                        @endforeach
                    </div>
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
                            @foreach ($mergedData as $index => $coopInfo)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="itemCheckbox" id="checkbox{{$coopInfo['id']}}" name="selectedCoops[]" value="{{ $coopInfo['id'] }}">                         
                                    </td>
                                    <td>{{ $coopInfo['id'] }}</td>
                                    <td><a href="{{ route('admin.adminViewCoopInfo', ['id' => $coopInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $coopInfo['coop_name'] }}</a></td>
                                    <td>{{ $coopInfo['representative_name'] }}</td>
                                    <td>{{ $coopInfo['coop_locations'] }}</td>
                                    <td><a href="{{ route('admin.adminViewCoopPayInfo', ['id' => $coopInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $coopInfo['pay_status'] }}</a></td>                                 
                                    <td><button type="button">
                                        <a href="{{ route('admin.adminEditCoopInfo', ['id' => $coopInfo['id']]) }}">
                                            <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                                    <td><button type="button">
                                        <a href="{{ route('admin.adminViewCoopListDelete', ['id' => $coopInfo['id']]) }}">
                                            <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                                </tr>
                            @endforeach
                        </tbody>                                                                      
                    </table>
                    <input type="hidden" id="url" value="{{ route('admin.deleteAll') }}">
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @foreach ($mergedData as $index => $coopInfo)
                        @if (isset($coopInfo['selectedIds']))
                            <a href="{{ route('admin.adminViewCoopListDelete', ['id' => $coopInfo['selectedIds']]) }}"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>