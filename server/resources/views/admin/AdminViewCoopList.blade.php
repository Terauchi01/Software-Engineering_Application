@extends('admin.app')

@section('title', '事業者情報一覧')

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/admin/delete.js') }}"></script>
@endsection

@php
$currentPage = 'adminViewCoopList'
@endphp

@section('content')
<div class = "info">
    <div class ="flex-main">                        
        <h2>事業者情報管理</h2>

        <button id="deleteButton" class="custom-button">チェックした項目を削除</button>

        &nbsp &nbsp &nbsp
        <select onChange="location.href=this.value;">
            <option>都道府県名を選択</option>
            
            @foreach ($Prefecture_list as $key => $value)
                <option value="{{ route('admin.adminViewCoopList', ['prefecture_id' => $key]) }}">{{ $value }}</option>
                @endforeach
        </select>
        
        <select onChange="location.href=value;">
			<option>支払い状況を選択</option>
			@php
			$payStatus = collect($mergedData)->unique('pay_status')->values();
			@endphp           
			@foreach ($payStatus as $index => $payInfo)
		    	<option value="{{ route('admin.adminViewCoopList', ['pay_id' => $payInfo['pay_id']]) }}">
		        	{{ $payInfo['pay_status'] }}
		   	 	</option>
			@endforeach
		</select>
        
        <form action="{{ route('admin.adminViewCoopList', ['id' => '']) }}" method="GET" style="display: inline;">
            <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
        </form>
        
        <p>
            @php
            $selected = collect($mergedData)->unique('prefecture_name')->values();
            @endphp

            @if ($selected->count() === 1)
                選択された都道府県: 
                <span style="border: 1px solid #000; padding: 5px; display: inline;">
                    {{ $selected->first()['prefecture_name'] }}
                </span>
                @elseif ($selected->count() === 0)
                選択された都道府県には事業者が存在しません
                @endif
        </p>
        <p>
            <input type="checkbox" id="masterCheckbox" name="feature_enabled">
            <label for="masterCheckbox">Select all</label>
        </p>
        
        <table class ="coop">
            <thead>
                <tr>
                    <th></th>
                    <th>事業者番号</th>
                    <th>事業者名</th>
                    <th>事業者代表名</th>
                    <th>所在地</th>
                    <th>先月の支払い状況</th>                                                                              
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $coopInfo)
                    <tr>
                        <td>
                            <input type="checkbox" class="itemCheckbox" id="checkbox{{$coopInfo['id']}}" name="selectedCoops[]" value="{{ $coopInfo['id'] }}">
                        </td>
                        <td>{{ $coopInfo['id'] }}</td>
                        <td><a href="{{ route('admin.adminViewCoopInfo', ['id' => $coopInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $coopInfo['coop_name'] }}</a></td>
                        <td>{{ $coopInfo['representative_name'] }}</td>
                        <td>{{ $coopInfo['coop_locations'] }}</td>
                        <td><a href="{{ route('admin.adminViewCoopPayInfo', ['id' => $coopInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $coopInfo['pay_status'] }}</a></td>                       
                        <td><button type="button">
                            <a href="{{ route('admin.adminViewCoopListDelete', ['id' => $coopInfo['id']]) }}">
                                <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        <input type="hidden" id="url" value="{{ route('admin.deleteAll') }}">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @foreach ($mergedData as $index => $coopInfo)
            @if (isset($coopInfo['selectedIds']))
                <a href="{{ route('admin.adminViewCoopListDelete', ['id' => $coopInfo['selectedIds']]) }}"></a>
            @endif
        @endforeach
    </div>
</div>
</div>
@endsection
