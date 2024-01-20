@extends('admin.app')

@section('title', 'ドローンタイプ一覧')

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
$currentPage = 'adminViewDroneType'
@endphp

@section('content')
<div class = "main">
    <div class ="flex-main">
        <div class = "coopList"> <!--#408A7E-->
            <p><h2><font color ="#408A7E"><u> ドローンタイプ一覧 </u></font></h2></p>
        </div>                   
        
        <p>
            <input type="checkbox" id="masterCheckbox" name="feature_enabled">
            <label for="masterCheckbox">Select all</label>
        </p>
        
        
        <table class ="coop">
            <thead>
                <tr>
                    <th></th>
                    <th>ドローン番号</th>
                    <th>ドローン種の名前</th>
                    <th>航続距離</th>                          
                    <th>積載重量</th>
                    <th>飛行可能時間</th>
                    <th>数</th>
                    <th>貸出中ドローン</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $droneInfo)
                    <tr>
                        <td>
                            <input type="checkbox" class="itemCheckbox" id="checkbox{{$droneInfo['id']}}" name="selectedCoops[]" value="{{ $droneInfo['id'] }}">
                        </td>
                        <td>{{ $droneInfo['id'] }}</td>
                        <td>{{ $droneInfo['name'] }}</td>
                        <td>{{ $droneInfo['range'] }}</td>
                        <td>{{ $droneInfo['loading_weight'] }}</td>
                        <td>{{ $droneInfo['max_time'] }}</td>
                        <td>{{ $droneInfo['number_of_drones'] }}</td>
                        <td>{{ $droneInfo['lend_drones_sum'] }}</td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminEditAdminDrone', ['id' => $droneInfo['id']]) }}">
                                <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                    </tr>
                    @endforeach
            </tbody>

            <script>
             document.getElementById('masterCheckbox').addEventListener('change', function() {
                 var masterCheckbox = this;
                 var itemCheckboxes = document.querySelectorAll('.itemCheckbox');

                 itemCheckboxes.forEach(function(itemCheckbox) {
                     itemCheckbox.checked = masterCheckbox.checked;
                 });
             });

             // 各行のチェックボックスに対するイベントリスナーも追加する場合
             document.querySelectorAll('.itemCheckbox').forEach(function(itemCheckbox) {
                 itemCheckbox.addEventListener('change', function() {
                     var allChecked = true;
                     document.querySelectorAll('.itemCheckbox').forEach(function(checkbox) {
                         if (!checkbox.checked) {
                             allChecked = false;
                         }
                     });
                     document.getElementById('masterCheckbox').checked = allChecked;
                 });
             });
             
             function editCoop(coopId) {
                 var confirmation = confirm('編集しますか？ Coop ID: ' + coopId);
                 
                 if (confirmation) {
                     alert('編集処理を実行します。Coop ID: ' + coopId);
                 }
             }
             
             function confirmDelete(coopId) {
                 if (confirm('本当に削除しますか？')) {
                     alert('削除ボタンがクリックされました。Coop ID: ' + coopId);
                 }
             }
            </script>
        </table>
    </div>
</div>
@endsection
