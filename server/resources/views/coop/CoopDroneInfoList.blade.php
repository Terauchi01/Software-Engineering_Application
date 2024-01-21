@extends('coop.app')

@section('title', 'ドローン情報一覧')

@section('style')
<link rel="stylesheet" href="{{ asset('css/coop/CoopList.css') }}">
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
$currentPage = 'coopDroneInfoList'
@endphp

@section('content')
<div class = "main">
    <div class ="flex-main">                        
        <p><h2><font color ="#408A7E"><u> ドローン情報一覧 </u></font></h2></p>
        
        <select onChange="location.href=this.value;">
            <option>ドローン状況を選択</option>
            @php
            $uniqueCompanies = collect($mergedData)->unique('drone_status')->values();
            @endphp
            @foreach ($uniqueCompanies as $index => $droneInfo)
                <option value="{{ route('coop.coopDroneInfoList', ['id' => $droneInfo['possession_or_loan']]) }}">{{ $droneInfo['drone_status'] }}</option>
            @endforeach
        </select>
        <form action="{{ route('coop.coopDroneInfoList', ['id' => '']) }}" method="GET" style="display: inline;">
            <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
        </form>
        <br><br>
        <table class ="coop">
            <thead>
                <tr>
                    <th>ドローン番号</th>
                    <th>ドローンの種類</th>
                    <th>状況</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $droneInfo)
                    <tr>
                        <td>{{ $droneInfo['id'] }}</td>                                   
                        <td>{{ $droneInfo['drone_type_id'] }}</td>
                        <td>{{ $droneInfo['drone_status'] }}</td>                           
                        <td><button type="button">
                            <a href="{{ route('admin.adminEditCoopDroneInfo', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                        <td><button type="button">
                            <a href="{{ route('coop.coopDroneInfoListDelete', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                    </tr>
                @endforeach
            </tbody>                          
        </table>
    </div>
</div>
@endsection
