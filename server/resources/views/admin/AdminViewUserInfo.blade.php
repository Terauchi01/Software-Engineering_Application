@extends('admin.app')

@section('title', '利用者情報詳細')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminViewUserInfo.css') }}">
@endsection

@section('script')
@endsection

@php
$currentPage = 'adminViewUserList'
@endphp

@section('content')
<div class="userInfo">
    <p class="information"><h2><font color ="#408A7E"><u>利用者情報詳細</u></font></h2></p>
    <p class="userName">{{ $userName }}</p>
    @if($userId !== null)
    <p class="userId">ID : {{ $userId }}</p>
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
<div class = "header">
    <select onChange="location.href=value;">
        <option>管理者</option>
        <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
    </select>
    <p>admin</p> <!-- ここをユーザ名とする -->
</div>
@endsection
