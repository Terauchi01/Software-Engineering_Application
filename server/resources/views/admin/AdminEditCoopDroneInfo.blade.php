@extends('admin.app')

@section('title', 'ドローン情報編集')

@section('style')
<link rel="stylesheet" href="{{ asset('/css/common/EditInfo.css') }}">
<style>
.current {
    background-color: #ffffff;
    height: 40pt;
    text-align: center;
}
</style>
@endsection

@section('script')
@endsection

@php
$currentPage = 'adminViewDroneType'
@endphp

@section('content')
<div class="info">
    <h2>事業者ドローン情報編集</h2>

    <!-- <p class="name">{{ $Drone->name }}</p> -->
    @if($Drone->id !== null)
    <p class="currentID">ID : {{ $Drone->id }}</p>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form id="editCoopDroneForm" method="post" action="{{ route('admin.editCoopDrone', $Drone->id) }}">
        @csrf

        <table>
            <tr>
                <th>ドローンの種類</th>
                <th>
                    <div class="left">
                        <input type="number" name="drone_type_id" class="form-control" value="{{ old('drone_type_id', $Drone->drone_type_id) }}" required>
                    </div>
                </th>
            </tr>

            <tr>
                <th>事業者ID</th>
                <th>
                    <div class="left">
                        <input type="number" name="coop_user_id" class="form-control" value="{{ old('coop_user_id', $Drone->coop_user_id) }}">
                    </div>
                </th>
            </tr>

            <tr>
                <th>購入時期</th>
                <th>
                    <div class="left">
                        <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date', \Carbon\Carbon::parse($Drone->purchase_date)->toDateString()) }}" required>
                    </div>
                </th>
            </tr>

            <tr>
                <th>稼働状況</th>
                <th>
                    <div class="left">
                        <!-- <input type="number" name="drone_status" class="form-control" value="{{ old('drone_status', $Drone->drone_status) }}" required> -->
                        <input type="radio" name="drone_status" value="0" required>
                        <label for="wait">待機中</label>
                        <input type="radio" name="drone_status" value="1" required>
                        <label for="move">稼働中</label>
                    </div>
                </th>
            </tr>

            <tr>
                <th>ドローンの所有状況</th>
                <th>
                    <div class="left">
                        <!-- <input type="number" name="possession_or_loan" class="form-control" value="{{ old('possession_or_loan', $Drone->possession_or_loan) }}" required> -->
                        <input type="radio" name="possession_or_loan" value="0" required>
                        <label for="lone">借用</label>
                        <input type="radio" name="possession_or_loan" value="1" required>
                        <label for="have">所持</label>
                    </div>
                </th>
            </tr>

            <tr>
                <th>貸与期限</th>
                <th>
                    <div class="left">
                        <input type="date" name="lending_period" class="form-control" value="{{ old('lending_period', \Carbon\Carbon::parse($Drone->lending_period)->toDateString()) }}">
                    </div>
                </th>
            </tr>

            <tr>
                <th>稼働時間</th>
                <th>
                    <div class="left">
                        <input type="number" name="operating_time" class="form-control" value="{{ old('operating_time', $Drone->operating_time) }}" required>
                    </div>
                </th>
            </tr>
        </table>

        <input type="hidden" name="id" value="{{ $Drone->id }}">
        <div class="confirm">
            <button type="submit" class="btn btn-primary">上記の内容で更新する</button>
        </div>
    </form>
    @endif
</div>