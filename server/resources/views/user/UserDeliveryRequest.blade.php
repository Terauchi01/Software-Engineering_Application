@extends('user.app')

@section('title', '宅配依頼')

@section('style')
<link rel="stylesheet" href="{{ asset('css/common/Register.css') }}">
<style>
.current {
    background-color: #ffffff;
    height: 20pt;
    text-align: center;
}
</style>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>const citiesData = @json($Cities);</script>
<script src="{{ asset('js/common/city.js') }}"></script>
@endsection

@php
$currentPage = 'userDeliveryRequest'
@endphp

@section('content')
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
        <form method="POST" action="{{ route('user.deliveryRequest') }}" style="padding-left: 110pt">
            @csrf
            <div class="inputs">
                <p><h2><font color ="#408A7E"><u> 宅配依頼 </u></font></h2></p>
                <h2>配送相手の個人情報(相手もこのシステムにユーザ登録している必要があります)</h2>
                <div class="name">
                    <label for="user_name">お名前</label>
                    <input type="text" name="user_last_name" placeholder="姓" required style="width: 20%">
                    <input type="text" name="user_first_name" placeholder="名" required style="width: 20%">
                </div>

                <div class="name">
                    <label for="user_name_kana">お名前(カナ)</label>
                    <input type="text" name="user_last_name_kana" placeholder="セイ" required style="width: 20%">
                    <input type="text" name="user_first_name_kana" placeholder="メイ" required style="width: 20%">
                </div>

                <!-- 郵便番号 -->
                <div>
                    <label for="postal_code">郵便番号</label>
                    <input type="text" name="postal_code" required>
                </div>

                <!-- 都道府県id -->
                <div>
                    <label for="prefecture_id">都道府県</label>
                    <select id="prefecture" name="prefecture_id" required>
                        @foreach ($Prefecture as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                    <!-- 市区町村のセレクトボックス -->
                    <label for="city_id">市区町村</label>
                    <select id="city" name="city_id" required>
                    </select>
                </div>

                <!-- それ以降 -->
                <div>
                    <label for="town">市区町村以降の住所</label>
                    <input type="text" name="town" required>
                </div>
                <div>
                    <label for="block">建物名</label>
                    <input type="text" name="block" required>
                </div>

                <!-- 宅配物 -->
                <label for="item">宅配物</label>
                <input type="text" name="item" required><br>

                <!-- 配達要望日時 -->
                <label for="request_date">配達要望日時</label>
                <input type="datetime-local" name="request_date" required>
            </div>
            <div class="regist"><button type="submit">送信</button></div>
        </form>
@endsection