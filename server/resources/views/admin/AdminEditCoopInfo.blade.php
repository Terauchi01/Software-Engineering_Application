@extends('admin.app')
                       
@section('title', '事業者情報編集')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminInfo.css') }}">
@endsection

@section('script')
<script>const citiesData = @json($cities);</script>
{{-- <script>
    const nowBankId = @json($data['bank_id']);
    const nowBranchId = @json($data['branch_id']);
</script> --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/common/city.js') }}"></script>
<script src="{{ asset('js/common/bank.js') }}"></script>
@endsection
@php
$currentPage = 'adminViewCoopList'
@endphp

@section('content')
<div class="info">
    <p class="information"><h2><font color ="#408A7E"><u>事業者情報編集</u></font></h2></p>
    <p class="name">{{ $coopName }}</p>
    @if($coopId !== null)
    <p class="id">ID : {{ $coopId }}</p>
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

                        <label for="prefecture_id">都道府県</label>
                        <select id="prefecture" name="prefecture_id" required>
                            @foreach ($prefectures as $id => $name)
                                <option value="{{ $id }}" {{ $data['prefecture'] === $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                        </select>
                        <label for="city_id">市区町村</label>
                        <select id="city" name="city_id" required>
                        </select>
                    </div>
                    <div style="text-align:center">
                        <input type="text" name="town" value="{{ $data['town'] }}" placeholder="市区町村以降の住所" required>
                        <input type="text" name="block" value="{{ $data['block'] }}" placeholder="建物名" required>
                    </div>
                </th>
            </tr>
            <tr>
                <th>営業形態</th>
                <th><div class="left">
                    <label><input type="radio" name="land_or_air" value="1" {{ $data['land_or_air'] === 1 ? 'checked' : '' }}>陸運</label>
                    <label><input type="radio" name="land_or_air" value="2" {{ $data['land_or_air'] === 2 ? 'checked' : '' }}>空運</label>
                </div></th>
            </tr>
            <tr>
                <th>免許情報</th>
                <th>
                    <div class="left">
                        交付日<input type="date" name="date_of_issue" value="{{ $data['date_of_issue'] }}" required><br>
                        登録日<input type="date" name="date_of_registration" value="{{ $data['date_of_registration'] }}" required><br>
                        交付者<input type="text" name="name" value="{{ $data['name'] }}" required><br>
                        交付者生年月日<input type="date" name="birth" value="{{ $data['birth'] }}" required><br>
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
                        <input type="text" id="bankSearch" placeholder="銀行名を検索"><br>
                        <select id="bankSelect" name="bank_id"><option value="" disabled>銀行名を選択してください</option></select>
                        <select id="branchSelect" name="branch_id"><option value="" disabled>支店名を選択してください</option></select><br>
                        講座種別<input type="text" name="account_type" value="{{ $data['acc_type'] }}" placeholder="講座種別" required>
                        口座番号<input type="text" name="account_number" pattern="\d{12,13}" value="{{ $data['acc_num'] }}" placeholder="口座番号" required>
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
@endsection
