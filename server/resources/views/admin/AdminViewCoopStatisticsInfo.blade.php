@extends('admin.app')

@section('title', '事業者情報分析')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
@endsection

@section('script')

@endsection

@php
$currentPage = 'adminViewCoopStatisticsInfo'
@endphp

@section('content')
<div class="info">
    <div class="flex-main">
        <h2>事業者情報分析</h2>
        
        <button type="button" class="custom-button" onclick="location.href='{{ route('admin.adminViewCoopStatisticsInfoGraph') }}'">グラフ表示する</button>
        
        <table width="800" border="1" align="center"  bgcolor="ffffe0">
            <thead>
                <tr>
                    <th>事業者名</th>
                    <th>1か月の配達個数</th>
                    <th>ドローンの稼働率</th>
                </tr>
            </thead>
            <tbody>
                @foreach($name as $userId => $coopName)
                <tr>
                    <td align="center">{{ $coopName }}</td>
                    <td align="center">{{ $month_delivery[$userId] ? $month_delivery[$userId] . '万個' : $month_delivery[$userId] . '個' }}</td>
                    <td align="center">{{ $ratio[$userId] !== -1 ? number_format($ratio[$userId], 3) * 100 . '%' : 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
