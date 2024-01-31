@extends('coop.app')

@section('title', '事業者情報詳細')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminInfo.css') }}">
@endsection

@section('script')
@endsection

@php
$currentPage = 'coopDeliveryRequestList'
@endphp

@section('content')
<div class="info">
    <p class="information"><h2><font color ="#408A7E"><u>事業者情報詳細</u></font></h2></p>
    <p class="name">{{ $coopName }}</p>
    @if($coopId !== null)
    <table>
        <tr>
            <th>メールアドレス</th>
            <th>{{ $data['email'] }}</th>
        </tr>
        <tr>
            <th>事業者代表名</th>
            <th>{{ $data['name'] }}</th>
        </tr>
        <tr>
            <th>事業者代表名カナ</th>
            <th>{{ $data['kanaName'] }}</th>
        </tr>
        <tr>
            <th>事業拠点情報</th>
            <th>
                〒{{ $data['postal_code'] }}<br>
                {{ $data['address'] }}
            </th>
        </tr>
        <tr>
            <th>営業形態</th>
            <th>{{ $data['land_or_air'] }}</th>
        </tr>
        <tr>
            <th>従業員人数</th>
            <th>{{ $data['worker'] }}</th>
        </tr>
        <tr>
            <th>電話番号</th>
            <th>{{ $data['phone'] }}</th>
        </tr>
    </table>
    @endif
</div>
@endsection