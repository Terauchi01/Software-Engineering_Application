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
<div class = "info">
    <div class ="flex-main">
        <div class = "coopList"> <!--#408A7E-->
            <h2>ドローン貸与申請一覧</h2>
        </div>

        <br></br>
        
        <table class ="coop">
            <thead>
                <tr>                 
                    <th>申請番号</th>            
                    <th>ユーザ名</th>
                    <th>ドローンタイプ</th>          
                    <th>貸与希望数</th>
                    <th>貸与希望開始日</th>
                    <th>貸与希望終了日</th>                          
                    <th>承認</th>
                    <th>却下</th>                               
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $applyInfo)
                    <tr>                       
                        <td>{{ $applyInfo['id'] }}</td>                                   
                        <td>{{ $applyInfo['user_id'] }}</td>
                        <td>{{ $applyInfo['drone_type_id'] }}</td>
                        <td>{{ $applyInfo['number'] }}</td>
                        <td>{{ $applyInfo['start_date'] }}</td>
                        <td>{{ $applyInfo['end_date'] }}</td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminViewCoopApplyDroneLendListApproval', ['id' => $applyInfo['id']]) }}">
                                <img src="{{ asset('image/img_approval.png') }}" alt="承認" width="20" height="20"></a></button>
                        </td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminViewCoopApplyDroneLendListDelete', ['id' => $applyInfo['id']]) }}">
                                <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>                      
        </table>
    </div>
</div>
@endsection
