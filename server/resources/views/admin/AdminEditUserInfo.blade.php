<!DOCTYPE html>
<html lang="ja">

    <head>
        <title>利用者情報編集</title>
        <link rel="stylesheet" href="{{ asset('/css/common/EditInfo.css') }}">
        <script>const citiesData = @json($cities);</script>
        <script src="{{ asset('js/common/city.js') }}"></script>
    </head>

    <body>
        <div class="header">
            <select onChange="location.href=value;">
                <option>管理者</option>
                <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
            </select>
            <p>admin</p> <!-- ここをユーザ名とする -->
        </div>

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
        <div class="info">
            <h2><u>利用者情報編集</u></h2>
            <p class="name">{{ $userName }}</p>
            @if($userId !== null)
            <p class="currentID">ID : {{ $userId }}</p>
            <form action="{{ route('admin.adminEditUserInfoApply',["id"=>$userId]) }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>メールアドレス</th>
                        <th>
                            <div class="left"><input type="email" name="email" value="{{ $data['email'] }}" placeholder="example@mail.com"></div>
                        </th>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <th>
                            <div class="left"><input type="password" name="password" placeholder="{{ $data['password'] }}"></div>
                        </th>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <th>
                            <div class="left">
                                〒<input type="text" name="postal_code" value="{{ $data['postal_code'] }}" placeholder="郵便番号" required>
                                <label for="prefecture_id">都道府県</label>
                                <select id="prefecture" name="prefecture_id" required>
                                    @foreach ($prefectures as $id => $name)
                                        <option value="{{ $id }}" {{ $data['prefecture'] == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                <label for="city_id">市区町村</label>
                                <select id="city" name="city_id" required>
                                </select>
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
                        <th>
                            <div class="left"><input type="text" name="phone_number" pattern="\d{10,11}" value="{{ $data['phone_number'] }}" placeholder="ハイフン無しで入力してください" required></div>
                        </th>
                    </tr>
                </table>
                <input type="hidden" name="id" value="{{ $userId }}">
                <div class="confirm">
                    <button type="submit">上記内容で更新する</button>
                </div>
            </form>
        @endif
        </div>
    </body>
</html>
