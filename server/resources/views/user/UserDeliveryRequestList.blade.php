@extends('user.app')

@section('title', '宅配依頼一覧')

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
$currentPage = 'userDeliveryRequestList'
@endphp

@section('content')
    <div class = "main">
        <div class ="flex-main">                        
            <p><h2><font color ="#408A7E"><u> 宅配依頼一覧 </u></font></h2></p>
            @if(empty($mergedData))
                <p>宅配依頼が存在しません</p>
            @else
                <table class ="coop">
                    <thead>
                        <tr>
                            <th>依頼番号</th>
                            <th>送り主情報</th>
                            <th>受け取り主情報</th>
                            <th>商品名</th>
                            <th>配達状況</th>
                            <th>配達日</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mergedData as $index => $requestInfo)
                            <tr>
                                <td>{{ $requestInfo['id'] }}</td>                        
                                <td>{{ $requestInfo['user_id'] }}</td>
                                <td>{{ $requestInfo['delivery_destination_id'] }}</td>
                                <td>{{ $requestInfo['item'] }}</td>
                                <td>{{ $requestInfo['delivery_status'] }}</td>
                                <td>{{ $requestInfo['delivery_date'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>                                                            
                </table>
            @endif
        </div>
    </div>
@endsection