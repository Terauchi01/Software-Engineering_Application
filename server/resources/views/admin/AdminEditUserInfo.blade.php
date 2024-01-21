@extends('admin.app')

@section('title', '利用者情報編集')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminInfo.css') }}">
@endsection

@section('script')
<script>const citiesData = @json($cities);</script>
<script src="{{ asset('js/common/city.js') }}"></script>
@endsection

@php
$currentPage = 'adminViewUserList'
@endphp

@section('content')
<div class="info">
    <p class="information"><h2><font color ="#408A7E"><u>利用者情報編集</u></font></h2></p>
    <p class="name">{{ $userName }}</p>
    @if($userId !== null)
    <p class="id">ID : {{ $userId }}</p>
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
                        <input type="text" name="town" value="{{ $data['town'] }}" placeholder="市区町村以降の住所" required>
                        <input type="text" name="block" value="{{ $data['block'] }}" placeholder="建物名" required>
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
@endsection
