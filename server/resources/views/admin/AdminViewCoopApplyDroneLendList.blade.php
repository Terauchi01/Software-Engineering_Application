@extends('admin.app')

@section('title', 'ドローン貸与申請一覧')

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
$currentPage = 'adminViewCoopApplyDroneLendList'
@endphp

@section('content')
<div class = "main">
    <div class ="flex-main">
        <div class = "coopList"> <!--#408A7E-->
            <p><h2><font color ="#408A7E"><u> ドローン貸与申請一覧 </u></font></h2></p>
        </div>

        <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a></p>                       

        <br></br>
        
        <table class ="coop">
            <thead>
                <tr>                 
                    <th>申請番号</th>                                
                    <th>事業者名</th>
                    <th>ドローン情報</th>
                    <th>承認</th>
                    <th>却下</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $droneInfo)
                    <tr>                       
                        <td>{{ $droneInfo['id'] }}</td>                                   
                        <td>{{ $droneInfo['coop_user_id'] }}</td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminViewCoopDroneInfo', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_drone.png') }}" alt="詳細" width="20" height="20"></a></button>
                        </td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminEditUserInfo', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_approval.png') }}" alt="承認" width="20" height="20"></a></button>
                        </td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminViewCoopDroneInfoDelete', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>                      
        </table>
    </div>
</div>
@endsection
