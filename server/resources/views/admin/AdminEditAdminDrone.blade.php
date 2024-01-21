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
    <h2><u>ドローン情報編集</u></h2>

    @if ($err !== null)
    <p class="name">{{ $err }}</p>
    @else
    @if ($errors->any())
    <div><strong class="red">入力エラーがあります。</strong></div>
    @endif
    <p class="name">{{ $Drone->name }}</p>
    <p class="currentID">ID : {{ $Drone->id }}</p>

    <form method="post" action="{{ route('admin.editDrone', $Drone->id) }}">
        @csrf

        <table>
            @foreach ([
                'number_of_drones' => 'ドローンの数',
                'name' => 'ドローン名',
                'range' => '航続距離',
                'loading_weight' => '搭載重量',
                'max_time' => '最大飛行時間',
                'lend_drones_sum' => '貸し出し数',
            ] as $fieldName => $label)
            <tr>
                <th>{{ $label }}</th>
                <th>
                    <div class="left">
                        @if($fieldName == 'name')
                            <input type="text" name="{{ $fieldName }}" class="form-control" value="{{ old($fieldName, $Drone->$fieldName) }}" required>
                        @else
                            <input type="number" name="{{ $fieldName }}" class="form-control" value="{{ old($fieldName, $Drone->$fieldName) }}" required>
                        @endif
                        @if($errors->has($fieldName))
                            @php
                                $errorMessage = str_replace($fieldName, $label, $errors->first($fieldName));
                            @endphp
                            <p class="red">{{ $errorMessage }}</p>
                        @endif
                    </div>
                </th>
            </tr>
            @endforeach
        </table>

        <input type="hidden" name="id" value="{{ $Drone->id }}">

        <div class="confirm">
            <button type="submit" class="btn btn-primary">上記の内容で更新する</button>
        </div>
    </form>
    @endif
</div>
@endsection
