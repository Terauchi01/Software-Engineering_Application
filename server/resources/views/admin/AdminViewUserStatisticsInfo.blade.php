@extends('admin.app')

@section('title', '利用者情報分析')

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/common.css') }}">
@endsection

@section('script')
@endsection

@php
$currentPage = 'adminViewUserStatisticsInfo'
@endphp

@section('content')
<div class="info">
    <div class="flex-main">
        <h2>利用者情報分析</h2>
        
        <button type="button" class="custom-button" onclick="location.href='{{ route('admin.adminViewUserStatisticsInfoGraph') }}'">グラフ表示する</button>
        
        <table border="1" align="center" bgcolor="#fff0f5">
            <thead>
                <tr>
                    <th width="150">累計配達個数</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td align="center">{{ $sum }}万個</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table border="1" align="center" bgcolor="#e0ffff">
            <thead>
                <tr>
                    <th width="150">都道府県</th>
                    <th width="180">配達個数(配送元)</th>
                    <th width="180">配達個数(配送先)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Prefecture as $prefecture)
                <tr>
                    <td align="center">{{ $prefecture->name }}</td>
                    <td align="center">{{ isset($fromCounts[$prefecture->id]) ? $fromCounts[$prefecture->id] . '万個' : 0 . '個'}}</td>
                    <td align="center">{{ isset($toCounts[$prefecture->id]) ? $toCounts[$prefecture->id] . '万個' : 0 . '個'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
