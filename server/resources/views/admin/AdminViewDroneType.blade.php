@extends('admin.app')

@section('title', 'ドローンタイプ一覧')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
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
<div class = "main">
    <div class ="flex-main">
        <div class = "coopList"> <!--#408A7E-->
            <p><h2><font color ="#408A7E"><u> ドローンタイプ一覧 </u></font></h2></p>
        </div>                   
        
        <br></br>
        
        <table class ="coop">
            <thead>
                <tr>
                    <th>ドローン番号</th>
                    <th>ドローン種の名前</th>
                    <th>航続距離</th>                          
                    <th>積載重量</th>
                    <th>飛行可能時間</th>
                    <th>数</th>
                    <th>貸出中ドローン</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $droneInfo)
                    <tr>                       
                        <td>{{ $droneInfo['id'] }}</td>
                        <td>{{ $droneInfo['name'] }}</td>
                        <td>{{ $droneInfo['range'] }}</td>
                        <td>{{ $droneInfo['loading_weight'] }}</td>
                        <td>{{ $droneInfo['max_time'] }}</td>
                        <td>{{ $droneInfo['number_of_drones'] }}</td>
                        <td>{{ $droneInfo['lend_drones_sum'] }}</td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminEditAdminDrone', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>           
        </table>
    </div>
</div>
@endsection
