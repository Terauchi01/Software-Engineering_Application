@extends('admin.app')

@section('title', '利用者情報一覧')

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
$currentPage = 'adminViewUserList'
@endphp

@section('content')
<div class = "main">
    <div class ="flex-main">                
        <p><h2><font color ="#408A7E"><u> 利用者情報管理 </u></font></h2></p>                                        
        <button id="deleteButton" class="custom-button">チェックした項目を削除</button>

        &nbsp &nbsp &nbsp
        <select onChange="location.href=this.value;">
            <option>利用者名を選択</option>
            @php
            $uniqueName = collect($mergedData)->unique('user_name')->values();
            @endphp
            @foreach ($uniqueName as $index => $userInfo)
                <option value="{{ route('admin.adminViewUserList', ['id' => $userInfo['id']]) }}">{{ $userInfo['user_name'] }}</option>
                @endforeach
        </select>
        <form action="{{ route('admin.adminViewUserList', ['id' => '']) }}" method="GET" style="display: inline;">
            <button type="submit" name="reset" id="resetButton" class="custom-button">リセット</button>
        </form>
        
        
        <p>
            <input type="checkbox" id="masterCheckbox" name="feature_enabled">
            <label for="masterCheckbox">Select all</label>
        </p>
        
        
        <table class ="coop">
            <thead>
                <tr>
                    <th></th>
                    <th>利用者番号</th>
                    <th>利用者名</th>
                    <th>メール</th>
                    <th>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $userInfo)
                    <tr>
                        <td>
                            <input type="checkbox" class="itemCheckbox" id="checkbox{{$userInfo['id']}}" name="selectedCoops[]" value="{{ $userInfo['id'] }}">
                        </td>
                        <td>{{ $userInfo['id'] }}</td>                                  
                        <td><a href="{{ route('admin.adminViewUserInfo', ['id' => $userInfo['id']]) }}" style="color:blue; text-decoration:none"> {{ $userInfo['user_name'] }}</a></td>
                        <td>{{ $userInfo['email_address'] }}</td>                                        
                        <td><button type="button">
                            <a href="{{ route('admin.adminViewUserListDelete', ['id' => $userInfo['id']]) }}">
                                <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>                                              
        </table>
        <input type="hidden" id="url" value="{{ route('admin.deleteAll') }}">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @foreach ($mergedData as $index => $userInfo)
            @if (isset($userInfo['selectedIds']))
                <a href="{{ route('admin.adminViewUserListDelete', ['id' => $userInfo['selectedIds']]) }}"></a>
            @endif
        @endforeach
    </div>
</div>
@endsection
