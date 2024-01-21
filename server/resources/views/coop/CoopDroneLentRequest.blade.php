@extends('coop.app')

@section('title', 'ドローン登録')

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
$currentPage = 'coopApplyAdminDroneLend'
@endphp

@section('content')
<div class="contents">
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
    <form method="POST" action="{{ route('coop.applyDroneLend') }}">
        @csrf
        <div class="inputs">
            <h2>ドローン貸与申請</h2>
            <!-- ドローンタイプid -->
            <div>
                <label for="drone_type_id">ドローン選択</label>
                <select name="drone_type_id" required>
                    @foreach ($droneInfoArray as $id => $drone)
                        <option value="{{ $id }}">{{ $drone['name'] }}, 航続距離:{{$drone['range']}}km, max:{{$drone['number_of_drones']-$drone['lend_drones_sum']}}台</option>
                    @endforeach
                </select>
            </div>
            <!-- 貸与希望数 -->
            <div>
                <label for="number">貸与希望数</label>
                <input type="number" name="number" required>
            </div>

            <!-- 貸与開始希望日 -->
            <div>
                <label for="start_date">貸与開始希望日</label>
                <input type="date" name="start_date" required>
            </div>

            <!-- 貸与終了希望日 -->
            <div>
                <label for="end_date">貸与終了希望日</label>
                <input type="date" name="end_date" required>
            </div>

            <div class="regist"><button type="submit">送信</button></div>
        </div>
    </form>
</div>
