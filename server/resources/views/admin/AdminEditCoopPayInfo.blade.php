@extends('admin.app')

@section('title', '事業者支払い情報編集')

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
    <h2>事業者支払い情報編集</h2>
    <p class="name">{{ $coopName }}</p>
    @if($coopId !== null)
    <p class="id">ID : {{ $coopId }}</p>
    <form action="{{ route('admin.adminEditCoopPayInfoApply') }}" method="POST">
        @csrf
        <table>
            <tr>
                <th>先月の支払い状況</th>
                <th>
                    <div class="left">
                        <label><input type="radio" name="pay_status" value="0" {{ $data['pay_status'] == 0 ? 'checked' : '' }}>未</label>
                        <label><input type="radio" name="pay_status" value="1" {{ $data['pay_status'] == 1 ? 'checked' : '' }}>済</label>
                    </div>
                </th>
            </tr>
            <tr>
                <th>支払い情報</th>
                <th><input type="number" name="pay" value="{{ $data['pay'] }}">円</th>
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
        <input type="hidden" name="id" value="{{ $coopId }}">
        <div class="confirm">
            <button type="submit">上記内容で更新する</button>
        </div>
    </form>
    @endif
</div>
@endsection
