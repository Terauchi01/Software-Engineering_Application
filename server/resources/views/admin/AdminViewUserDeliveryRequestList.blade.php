@extends('admin.app')

@section('title', '利用者宅配一覧')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
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
$currentPage = 'adminViewUserDeliveryRequestList'
@endphp

@section('content')
<div class = "main">
    <div class ="flex-main">            
        <p><h2><font color ="#408A7E"><u> 利用者宅配一覧 </u></font></h2></p>                                                           

        <select onChange="location.href=value;">
            <option>利用者を選択</option>
            @php
            $uniqueName = collect($mergedData)->unique('user_name')->values();
            @endphp           
            @foreach ($uniqueName as $index => $deliveryInfo)
                <option value="{{ route('admin.adminViewUserDeliveryRequestList', ['id' => $deliveryInfo['user_id']]) }}">
                    {{ $deliveryInfo['user_name'] }}
                </option>
                @endforeach
        </select>
        <form action="{{ route('admin.adminViewUserDeliveryRequestList', ['id' => '']) }}" method="GET" style="display: inline;">
            <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
        </form>
        <br></br>
        
        
        <table class ="coop">
            <thead>
                <tr>                 
                    <th>依頼番号</th>
                    <th>送り主情報</th>
                    <th>受け取り主情報</th>
                    <th>担当者事業者名</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($mergedData as $index => $deliveryInfo)
                    <tr>                     
                        <td>{{ $deliveryInfo['id'] }}</td>                                    
                        <td>{{ $deliveryInfo['user_name'] }}</td>
                        <td>{{ $deliveryInfo['delivery_destination_name'] }}</td>
                        <td>{{ $deliveryInfo['delivery_company_id'] }}</td>                      
                    </tr>
                    @endforeach
            </tbody>           
        </table>
    </div>
</div>
@endsection
