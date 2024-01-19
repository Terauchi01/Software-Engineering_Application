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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="{{ asset('js/admin/delete.js') }}"></script>
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

                    <button id="deleteButton" class="custom-button">チェックした項目を削除</button>

                    &nbsp &nbsp &nbsp
                    <select onChange="location.href=this.value;">
                        <option>都道府県名を選択</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 1]) }}">北海道</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 2]) }}">青森県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 3]) }}">岩手県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 4]) }}">宮城県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 5]) }}">秋田県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 6]) }}">山形県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 7]) }}">福島県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 8]) }}">茨城県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 9]) }}">栃木県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 10]) }}">群馬県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 11]) }}">埼玉県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 12]) }}">千葉県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 13]) }}">東京都</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 14]) }}">神奈川県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 15]) }}">新潟県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 16]) }}">富山県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 17]) }}">石川県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 18]) }}">福井県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 19]) }}">山梨県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 20]) }}">長野県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 21]) }}">岐阜県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 22]) }}">静岡県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 23]) }}">愛知県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 24]) }}">三重県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 25]) }}">滋賀県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 26]) }}">京都府</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 27]) }}">大阪府</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 28]) }}">兵庫県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 29]) }}">奈良県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 30]) }}">和歌山県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 31]) }}">鳥取県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 32]) }}">島根県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 33]) }}">岡山県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 34]) }}">広島県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 35]) }}">山口県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 36]) }}">徳島県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 37]) }}">香川県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 38]) }}">愛媛県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 39]) }}">高知県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 40]) }}">福岡県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 41]) }}">佐賀県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 42]) }}">長崎県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 43]) }}">熊本県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 44]) }}">大分県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 45]) }}">宮崎県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 46]) }}">鹿児島県</option>
                        <option value="{{ route('admin.adminViewCoopList', ['id' => 47]) }}">沖縄県</option>                        
                    </select>

                    
                    <form action="{{ route('admin.adminViewCoopList', ['id' => '']) }}" method="GET" style="display: inline;">
                        <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
                    </form>
                    
                    <p>
                        @php
                        $selected = collect($mergedData)->unique('prefecture_name')->values();
                        @endphp
                        @foreach ($selected as $index => $show)
                            {{ $show['prefecture_name'] }}       
                        @endforeach                                    
                    </p>
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
