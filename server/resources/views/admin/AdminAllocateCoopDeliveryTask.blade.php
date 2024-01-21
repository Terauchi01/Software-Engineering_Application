@extends('admin.app')

@section('title', '宅配依頼割り振り一覧')

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
$currentPage = 'adminAllocateCoopDeliveryTask'
@endphp

@section('content')
<div class = "info">
    <div class ="flex-main">            
        <h2>宅配依頼割り振り一覧</h2>
              
        <br></br>
        
        <table class ="coop">
            <thead>
                <tre>                   
                    <th>依頼番号</th>
                    <th>送り主情報</th>
                    <th>受け取り主情報</th>
                    <th>担当者事業者名</th>                 
                    <th>割り振り</th>           
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $deliveryInfo)
                    <tr>
                        <td>{{ $deliveryInfo['id'] }}</td>
                        <td>{{ $deliveryInfo['user_id'] }}</td>
                        <td>{{ $deliveryInfo['delivery_destination_id'] }}</td>
                        <td>{{ $deliveryInfo['delivery_company_id'] }}</td>                        
                        <td><button type="button">
                            <a href="{{ route('admin.adminAllocateCoopDeliveryTaskApproval', ['id' => $deliveryInfo['id']])  }}">
                                <img src="{{ asset('image/img_approval.png') }}" alt="承認" width="20" height="20"</a></button></td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminAllocateCoopDeliveryTaskDelete', ['id' => $deliveryInfo['id']]) }}">
                               <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>        
        </table>
    </div>
</div>
@endsection
