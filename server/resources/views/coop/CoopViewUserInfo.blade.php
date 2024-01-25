@extends('coop.app')

@section('title', '依頼一覧')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/AdminInfo.css') }}">
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
$currentPage = 'coopDeliveryRequestList'
@endphp

@section('content')
<div class="info">
    <p class="information"><h2><font color ="#408A7E"><u>利用者情報詳細</u></font></h2></p>
    <p class="name">{{ $userName }}</p>
    @if($userId !== null)
    <table>
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
