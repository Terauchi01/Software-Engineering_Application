<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>利用者情報編集</title>
        <link rel="stylesheet" href="{{ asset('/css/admin/AdminViewUserInfo.css') }}">
    </head>
    <body>
        <nav class="side">
            <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
            <div class="current">
                <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            </div>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
        </nav>
        <div class="userInfo">
            <p class="information"><h2><font color ="#408A7E"><u>利用者情報編集</u></font></h2></p>
            <p class="userName">{{ $userName }}</p>
            @if($userId !== null)
            <p class="userId">ID : {{ $userId }}</p>
            <form action="{{ route('admin.adminEditUserInfoApply') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>メールアドレス</th>
                        <th><div class="left"><input type="text" name="email" value="{{ $data['email'] }}" placeholder="example@mail.com"></div></th>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <th><div class="left"><input type="password" name="password" placeholder="{{ $data['password'] }}"></div></th>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <th>
                            <div class="left">
                                〒<input type="text" name="postal_code" value="{{ $data['postal_code'] }}" placeholder="郵便番号" required>
                                <input type="text" name="prefecture" value="{{ $data['prefecture'] }}" placeholder="都道府県" required>
                                <input type="text" name="city" value="{{ $data['city'] }}" placeholder="市区" required>
                            </div>
                            <div style="text-align:center">
                                <input type="text" name="town" value="{{ $data['town'] }}" placeholder="町村" required>
                                <input type="text" name="block" value="{{ $data['block'] }}" placeholder="住所" required>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>利用者名</th>
                        <th>
                            <div class="left">
                                <input type="text" name="last_name" value="{{ $data['last_name'] }}" placeholder="姓" required>
                                <input type="text" name="first_name" value="{{ $data['first_name'] }}" placeholder="名" required>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>利用者名カナ</th>
                        <th>
                            <div class="left">
                                <input type="text" name="last_name_kana" value="{{ $data['last_name_kana'] }}" placeholder="セイ" required>
                                <input type="text" name="first_name_kana" value="{{ $data['first_name_kana'] }}" placeholder="メイ" required>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <th><div class="left"><input type="text" name="phone_number" value="{{ $data['phone_number'] }}" placeholder="ハイフン無しで入力してください" required></div></th>
                    </tr>
                </table>
                <input type="hidden" name="id" value="{{ $userId }}">
                <div class="confirm">
                    <button type="submit">上記内容で更新する</button>
                </div>
            </form>
            @endif
        </div>
        <div class = "header">
            <select onChange="location.href=value;">
                <option>管理者</option>
                <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
            </select>
            <p>admin</p> <!-- ここをユーザ名とする -->
        </div>
    </body>
</html>
