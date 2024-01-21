@extends('user.app')

@section('title', '宅配場所登録')

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

@endsection

@php
$currentPage = 'userDeliveryPlaceRequest'
@endphp

@section('content')
    <div class="contents">
        <form action="{{ route('user.placeRequest') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="inputs">
                <p><h2><font color ="#408A7E"><u> 宅配場所登録 </u></font></h2></p>

                <!-- 他のフォーム要素 -->
                <label for="image">画像</label>
                <input style="border-width: 0px;" type="file" name="image" accept="image/*" required>

                <div class="regist"><button type="submit">登録</button></div>
            </div>
        </form>
    </div>
@endsection

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