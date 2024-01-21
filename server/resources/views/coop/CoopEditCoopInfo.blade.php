clu
<!DOCTYPE html>
<html lang="ja">

<head>
    <title>事業者情報編集</title>
    <link rel="stylesheet" href="{{ asset('/css/common/EditInfo.css') }}">
</head>

<body>
    <script>
        const citiesData = @json($Cities);
    </script>
    <script src="{{ asset('js/common/city.js') }}"></script>

    <nav class="side">
    </nav>

    <div class="info">
        <h2><u>事業者情報編集</u></h2>

        <form action="{{ route('coop.editCoopInfo') }}" method="POST">
            @csrf
            <h3>企業情報</h3>
            <table>
                <tr>
                    <th>メールアドレス</th>
                    <th>
                        <div class="left"><input type="email" name="email_address" value="{{ $coop->email_address }}" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;" required></div>
                    </th>
                </tr>

                <tr>
                    <th>パスワード</th>
                    <th>
                        <div class="left"><input type="password" name="password" value="{{ $coop->password }}" placeholder="8文字以上32文字以下、英数字" pattern="\w{8,32}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>事業者名</th>
                    <th>
                        <div class="left"><input type="text" name="coop_name" value="{{ $coop->coop_name }}" placeholder="事業者名" required></div>
                    </th>
                </tr>

                <tr>
                    <th>事業代表者名</th>
                    <th>
                        <div class="left">
                            <input type="text" name="representative_last_name" value="{{ $coop->representative_last_name }}" placeholder="性" required>
                            <input type="text" name="representative_first_name" value="{{ $coop->representative_first_name }}" placeholder="名" required>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th>事業代表者(カナ)</th>
                    <th>

                        <div class="left">
                            <input type="text" name="representative_last_name_kana" value="{{ $coop->representative_last_name_kana }}" placeholder="セイ" required>
                            <input type="text" name="representative_first_name_kana" value="{{ $coop->representative_first_name_kana }}" placeholder="メイ" required>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th>従業員数</th>
                    <th>
                        <div class="left"><input type="number" name="employees" value="{{ $coop->employees }}" placeholder="0" required></div>
                    </th>
                </tr>

                <tr>
                    <th>電話番号</th>
                    <th>
                        <div class="left">
                            <input type="tel" name="phone_number" value="{{ $coop->phone_number }}" placeholder="00000000000" pattern="\d{10,11}" required>
                        </div>
                    </th>
                </tr>

                <tr>
                    <th>陸運か空運か</th>
                    <th>
                        <div class="left">
                            <label for="land"><input type="radio" name="land_or_air" value="1" {{ $coop->land_or_air === 1 ? 'checked' : '' }}>陸運</label>
                            <label for="air"><input type="radio" name="land_or_air" value="2" {{ $coop->land_or_air === 2 ? 'checked' : '' }}>空運</label>
                        </div>
                    </th>
                </tr>
            </table>

            <h3>事業所情報</h3>
            <table>
                <tr>
                    <th>事業所名</th>
                    <th>
                        <div class="left"><input type="text" name="office_name" value="{{ $CoopLocation->office_name }}" required></div>
                    </th>
                </tr>
                <!-- 郵便番号 -->
                <tr>
                    <th>郵便番号</th>
                    <th>
                        <div class="left"><input type="text" name="postal_code" value="{{ $CoopLocation->postal_code }}" required></div>
                    </th>
                </tr>

                <!-- 都道府県id -->
                <tr>
                    <th>住所</th>
                    <th>
                        <div class="left">
                            <select id="prefecture" name="prefecture_id" required>
                                @foreach ($Prefecture as $id => $name)
                                <option value="{{ $id }}" {{ $id == $CoopLocation->prefecture_id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            <!-- 市区町村のセレクトボックス -->
                            <select id="city" name="city_id" required></select>
                        </div>
                        <div class="left">
                            <input type="text" name="town" placeholder="町名・番地" value="{{ $CoopLocation->town }}" required>
                            <input type="text" name="block" placeholder="建物名" value="{{ $CoopLocation->block }}" required>
                        </div>
                    </th>
                </tr>
            </table>


            <p>以下企業情報の代表者名と異なる場合のみ記載して下さい</p>
            <table>
                <tr>
                    <th>事業所代表者名</th>
                    <th>
                        <div class="left">
                            <input type="text" name="office_representative_last_name" placeholder="姓">
                            <input type="text" name="office_representative_first_name" placeholder="名">
                        </div>
                    </th>
                </tr>

                <tr>
                    <th>事業所代表者名(カナ)</th>
                    <th>
                        <div class="left">
                            <input type="text" name="office_representative_last_name_kana" placeholder="セイ">
                            <input type="text" name="office_representative_first_name_kana" placeholder="メイ">
                        </div>
                    </th>
                </tr>
            </table>

            <h3>免許情報</h3>
            <table>
                <tr>
                    <th>公布日</th>
                    <th>
                        <div class="left"><input type="date" name="date_of_issue" value="{{ \Carbon\Carbon::parse($LicenseInformation->date_of_issue)->toDateString() }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>登録日</th>
                    <th>
                        <div class="left"><input type="date" name="date_of_registration" value="{{ \Carbon\Carbon::parse($LicenseInformation->date_of_registration)->toDateString() }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>名前</th>
                    <th>
                        <div class="left"><input type="text" name="name" value="{{ $LicenseInformation->name }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>生年月日</th>
                    <th>
                        <div class="left"><input type="date" name="birth" value="{{ \Carbon\Carbon::parse($LicenseInformation->birth)->toDateString() }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>条件</th>
                    <th>
                        <div class="left"><input type="text" name="conditions" value="{{ $LicenseInformation->conditions }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>区分</th>
                    <th>
                        <div class=" left"><input type="text" name="classification" value="{{ $LicenseInformation->classification }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>限定事項1</th>
                    <th>
                        <div class="left"><input type="text" name="ratings_and_limitations1" value="{{ $LicenseInformation->ratings_and_limitations1 }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>限定事項2</th>
                    <th>
                        <div class="left"><input type="text" name="ratings_and_limitations2" value="{{ $LicenseInformation->ratings_and_limitations2 }}"></div>
                    </th>
                </tr>

                <tr>
                    <th>限定事項3</th>
                    <th>
                        <div class="left"><input type="text" name="ratings_and_limitations3" value="{{ $LicenseInformation->ratings_and_limitations3 }}"></div>
                    </th>
                </tr>

                <tr>
                    <th>番号</th>
                    <th>
                        <div class="left"><input type="text" name="number" value="{{ $LicenseInformation->number }}" required></div>
                    </th>
                </tr>
            </table>

            <h3>銀行情報</h3>
            <table>
                <tr>
                    <th>銀行名</th>
                    <th>
                        <div class="left"><input type="text" name="bank_id" value="{{ $AccountInformation->bank_id }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>支店名</th>
                    <th>
                        <div class="left"><input type="text" name="branch_id" value="{{ $AccountInformation->branch_id }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>口座の種別</th>
                    <th>
                        <div class="left"><input type="text" name="account_type" value="{{ $AccountInformation->account_type }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>口座番号</th>
                    <th>
                        <div class="left"><input type="text" name="account_number" value="{{ $AccountInformation->account_number }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>口座の持ち主の名前</th>
                    <th>
                        <div class="left"><input type="text" name="account_name" value="{{ $AccountInformation->account_name }}" required></div>
                    </th>
                </tr>

                <tr>
                    <th>口座持ち主の名前(カナ)</th>
                    <th>
                        <div class="left"><input type="text" name="account_name_kana" value="{{ $AccountInformation->account_name_kana }}" required></div>
                    </th>
                </tr>
            </table>

            <div class="confirm">
                <button type="submit">上記の内容で更新する</button>
            </div>
        </form>
    </div>
</body>


</html>


@if ($errors->any())
<div>
    <strong>入力エラーがあります。</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div>
    <p>{{ session('success') }}</p>
</div>
@endif