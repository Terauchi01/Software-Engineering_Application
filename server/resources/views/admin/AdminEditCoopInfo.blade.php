<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>事業者情報編集</title>
        <link rel="stylesheet" href="{{ asset('/css/common/EditInfo.css') }}">
    </head>
    <body>
        <nav class="side">
            <div class="current">
                <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            </div>
            <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
        </nav>

        <div class="info">
            <h2><u>事業者情報編集</u></h2>
            <p class="name">{{ $coopName }}</p>
            @if($coopId !== null)
            <p class="currentId">ID : {{ $coopId }}</p>
            <form action="{{ route('admin.adminEditCoopInfoApply') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>事業者名</th>
                        <th><div class="left"><input type="text" name="coop_name" value="{{ $data['coop_name'] }}" required></div></th>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <th><div class="left"><input type="email" name="email" value="{{ $data['email'] }}" placeholder="example@mail.com" required></div></th>
                    </tr>
                    <tr>
                        <th>パスワード</th>
                        <th><div class="left"><input type="password" name="password" placeholder="{{ $data['password'] }}"></div></th>
                    </tr>
                    <tr>
                        <th>事業者代表名</th>
                        <th>
                            <div class="left">
                                <input type="text" name="last_name" value="{{ $data['last_name'] }}" placeholder="姓" required>
                                <input type="text" name="first_name" value="{{ $data['first_name'] }}" placeholder="名" required>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>事業者代表名カナ</th>
                        <th>
                            <div class="left">
                                <input type="text" name="last_name_kana" value="{{ $data['last_name_kana'] }}" placeholder="セイ" required>
                                <input type="text" name="first_name_kana" value="{{ $data['first_name_kana'] }}" placeholder="メイ" required>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>事業拠点情報</th>
                        <th>
                            <div class="left">
                                〒<input type="text" name="postal_code" value="{{ $data['postal_code'] }}" placeholder="ハイフン無しで入力してください" required>
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
                        <th>営業形態</th>
                        <th><div class="left">
                            <label><input type="radio" name="land_or_air" value="1" {{ $data['land_or_air'] === 1 ? 'checked' : '' }}>陸</label>
                            <label><input type="radio" name="land_or_air" value="2" {{ $data['land_or_air'] === 2 ? 'checked' : '' }}>空</label>
                        </div></th>
                    </tr>
                    <tr>
                        <th>免許情報</th>
                        <th>
                            <div class="left">
                                交付日<input type="text" name="date_of_issue" value="{{ $data['date_of_issue'] }}" required><br>
                                登録日<input type="text" name="date_of_registration" value="{{ $data['date_of_registration'] }}" required><br>
                                交付者<input type="text" name="name" value="{{ $data['name'] }}" required><br>
                                交付者生年月日<input type="text" name="birth" value="{{ $data['birth'] }}" required><br>
                                条件<input type="text" name="conditions" value="{{ $data['conditions'] }}" required><br>
                                区分<input type="text" name="classification" value="{{ $data['classification'] }}" required><br>
                                限定事項1<input type="text" name="ratings_and_limitations1" value="{{ $data['ratings_and_limitations1'] }}" required><br>
                                限定事項2<input type="text" name="ratings_and_limitations2" value="{{ $data['ratings_and_limitations2'] }}" required><br>
                                限定事項3<input type="text" name="ratings_and_limitations3" value="{{ $data['ratings_and_limitations3'] }}" required>
                            </div>
                    </tr>
                    <tr>
                        <th>口座情報</th>
                        <th>
                            <div class="left">
                                <input type="text" name="bank_id" value="{{ $data['acc_bank'] }}" placeholder="銀行名" required>
                                <input type="text" name="branch_id" value="{{ $data['acc_branch'] }}" placeholder="支店名" required>
                                <input type="text" name="account_type" value="{{ $data['acc_type'] }}" placeholder="講座種別" required>
                                <input type="text" name="account_number" pattern="\d{12,13}" value="{{ $data['acc_num'] }}" placeholder="口座番号" required>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>従業員人数</th>
                        <th><div class="left"><input type="text" name="employees" pattern="[0-9]*" value="{{ $data['worker'] }}" required>人</div></th>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <th><div class="left"><input type="text" name="phone_number" pattern="\d{10,11}" value="{{ $data['phone'] }}" placeholder="ハイフン無しで入力してください" required></div></th>
                    </tr>
                </table>
                <input type="hidden" name="id" value="{{ $coopId }}">
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
