@extends('admin.app')

@section('title', '事業者支払い情報編集')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/admin/AdminInfo.css') }}">
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    var bankId = {{ intval($data['bank'], 10) }};
    var branchId = {{ intval($data['branch'], 10) }};
</script>
<script src="{{ asset('js/common/view_bank.js') }}"></script>
@endsection

@php
$currentPage = 'adminViewCoopList'
@endphp

@section('content')
<div class="info">
    <p class="information"><h2><font color="#408A7E"><u>事業者支払い情報編集</u></font></h2></p>
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
                <th><div id="bankInfo"></div></th>
            </tr>
            <tr>
                <th>支店名</th>
                <th><div id="branchInfo"></div></th>
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
