@extends('admin.app')

@section('title', '利用者情報詳細')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminInfo.css') }}">
@endsection

@section('script')
@endsection

@php
$currentPage = 'adminViewUserList'
@endphp

@section('content')
<div class="info">
    <h2>利用者情報詳細</h2>
    <p class="name">{{ $userName }}</p>
    @if($userId !== null)
    <p class="id">ID : {{ $userId }}</p>
    <form action="{{ route('admin.adminEditUserInfo',["id"=>$userId]) }}" method="GET">
        <input type="hidden" name="id" value="{{ $userId }}">
        <button type="submit" class="edit">編集する</button>
    </form>
    <table>
        <tr>
            <th>メールアドレス</th>
            <th>{{ $data['email'] }}</th>
        </tr>
        <tr>
            <th>パスワード</th>
            <th>{{ $data['password'] }}</th>
        </tr>
        <tr>
            <th>住所</th>
            <th>{{ $data['address'] }}</th>
        </tr>
        <tr>
            <th>利用者名</th>
            <th>{{ $data['name'] }}</th>
        </tr>
        <tr>
            <th>利用者名カナ</th>
            <th>{{ $data['kanaName'] }}</th>
        </tr>
        <tr>
            <th>電話番号</th>
            <th>{{ $data['phone_number'] }}</th>
        </tr>
    </table>
    @endif
</div>
@endsection
