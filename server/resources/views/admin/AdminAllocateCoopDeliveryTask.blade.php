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
<div class="main">
    <div class="flex-main">            
        <p><h2><font color ="#408A7E"><u> 宅配依頼割り振り一覧 </u></font></h2></p>
        
        <br></br>

        <form action="{{ route('admin.adminAllocateCoopDeliveryTaskApproval') }}" method="post">
            @csrf
            
            <table class="coop">
                <thead>
                    <tr>                   
                        <th>依頼番号</th>
                        <th>送り主情報</th>
                        <th>受け取り主情報</th>
                        <th>集荷担当者事業者名</th>
                        <th>中間担当者事業者名</th>
                        <th>配達担当者事業者名</th>
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
                            <td>
                                <select name="c_coop_id">
                                    <option value="">-- 選択してください --</option>
                                    @foreach($coops as $coop)
                                    <option value="{{ $coop->id }}">{{ $coop->coop_name }}</option>
                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="i_coop_id">
                                    <option value="">-- 選択してください --</option>
                                    @foreach($coops as $coop)
                                    <option value="{{ $coop->id }}">{{ $coop->coop_name }}</option>
                                    @endforeach
                                </select>
                            </td>          
                            <td>
                                <select name="d_coop_id">
                                    <option value="">-- 選択してください --</option>
                                    @foreach($coops as $coop)
                                    <option value="{{ $coop->id }}">{{ $coop->coop_name }}</option>
                                    @endforeach
                                </select>
                            </td>          

                            <td>
                                <button type="submit" name="id" value="{{ $deliveryInfo['id'] }}">
                                    <img src="{{ asset('image/img_approval.png') }}" alt="承認" width="20" height="20">
                                </button>
                            </td>
                            <td>
                                <button type="button">
                                    <a href="{{ route('admin.adminAllocateCoopDeliveryTaskDelete', ['id' => $deliveryInfo['id']]) }}">
                                        <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20">
                                    </a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>        
            </table>
        </form>
    </div>
</div>
@endsection
