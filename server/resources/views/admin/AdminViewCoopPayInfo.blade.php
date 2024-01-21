@extends('admin.app')

@section('title', '事業者支払い情報詳細')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminInfo.css') }}">
@endsection

@section('script')
@endsection

@php
$currentPage = 'adminViewCoopList'
@endphp

@section('content')
<div class="info">
    <p class="information"><h2><font color="#408A7E"><u>事業者支払い情報詳細</u></font></h2></p>
    <p class="name">{{ $coopName }}</p>
    @if($coopId !== null)
    <p class="id">ID : {{ $coopId }}</p>
    <form action="{{ route('admin.adminEditCoopPayInfo',["id"=>$coopId]) }}" method="GET">
        <input type="hidden" name="id" value="{{ $coopId }}">
        <button type="submit" class="edit">編集する</button>
    </form>
    <table>
        <tr>
            <th>先月の支払い状況</th>
            <th>{{ $data['pay_status'] }}</th>
        <tr>
            <th>支払い額</th>
            <th>{{ $data['pay'] }}</th>
        </tr>
        <tr>
            <th>銀行名</th>
            <th>{{ $data['bank'] }}</th>
        </tr>
        <tr>
            <th>支店名</th>
            <th>{{ $data['branch'] }}</th>
        </tr>
        <tr>
            <th>口座種別</th>
            <th>{{ $data['type'] }}</th>
        </tr>
        <tr>
            <th>口座番号</th>
            <th>{{ $data['number'] }}</th>
        </tr>
        <tr>
            <th>口座名義人</th>
            <th>{{ $data['name'] }}</th>
        </tr>
    </table>
    @endif
</div>
@endsection
