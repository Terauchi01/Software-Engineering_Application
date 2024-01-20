<!-- controller: server/app/Http/Controllers/AdminViewUserList.php -->
<!-- blade     : server/resources/views/admin/AdminViewUserList.php -->
<!-- css       : server/public/css/admin/AdminList.css -->
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>利用者情報管理</title>
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
            <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>         
            <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a></p>
            <div class="current">
                <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            </div>
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
                    <p><h2><font color ="#408A7E"><u> 利用者情報管理 </u></font></h2></p>                                        
                    <button id="deleteButton" class="custom-button">チェックした項目を削除</button>

                    &nbsp &nbsp &nbsp
                    <select onChange="location.href=this.value;">
                        <option>利用者名を選択</option>
                        @php
                        $uniqueName = collect($mergedData)->unique('user_name')->values();
                        @endphp
                        @foreach ($uniqueName as $index => $userInfo)
                            <option value="{{ route('admin.adminViewUserList', ['id' => $userInfo['id']]) }}">{{ $userInfo['user_name'] }}</option>
                        @endforeach
                    </select>
                    <form action="{{ route('admin.adminViewUserList', ['id' => '']) }}" method="GET" style="display: inline;">
                        <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
                    </form>
                    
                    
                    <p>
                        <input type="checkbox" id="masterCheckbox" name="feature_enabled">
                        <label for="masterCheckbox">Select all</label>
                    </p>
                    
                    
                    <table class ="coop">
                        <thead>
                            <tr>
                                <th></th>
                                <th>利用者番号</th>
                                <th>利用者名</th>
                                <th>メール</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mergedData as $index => $userInfo)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="itemCheckbox" id="checkbox{{$userInfo['id']}}" name="selectedCoops[]" value="{{ $userInfo['id'] }}">
                                    </td>
                                    <td>{{ $userInfo['id'] }}</td>                                  
                                    <td><a href="{{ route('admin.adminViewUserInfo', ['id' => $userInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $userInfo['user_name'] }}</a></td>
                                    <td>{{ $userInfo['email_address'] }}</td>                                                               
                                    <td><button type="button">
                                        <a href="{{ route('admin.adminEditUserInfo', ['id' => $userInfo['id']]) }}">
                                            <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                                    <td><button type="button">
                                        <a href="{{ route('admin.adminViewUserListDelete', ['id' => $userInfo['id']]) }}">
                                            <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                                </tr>
                            @endforeach
                        </tbody>                                              
                    </table>
                    <input type="hidden" id="url" value="{{ route('admin.deleteAll') }}">
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @foreach ($mergedData as $index => $userInfo)
                        @if (isset($userInfo['selectedIds']))
                            <a href="{{ route('admin.adminViewUserListDelete', ['id' => $userInfo['selectedIds']]) }}"></a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
