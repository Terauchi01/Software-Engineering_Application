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
<div class = "main">
    <div class ="flex-main">
        <div class = "coopList"> <!--#408A7E-->
            <p><h2><font color ="#408A7E"><u> 事業者ドローン情報一覧 </u></font></h2></p>
        </div>
        
        <p><a href="{{ route('admin.adminViewCoopApplyDroneLendList') }}">ドローン貸与申請一覧</a> > 事業者ドローン情報 </p>

        <p class="coopName">{{ $coopName ?? 存在しないユーザです }}</p>
        <button type="submit" name="add" id="filterButton" class="custom-button">承認</button>
        <button type="submit" name="add" id="resetButton" class="custom-button">却下</button>
        
        <script>
         document.getElementById('filterButton').addEventListener('click', function() {
             alert('承認');
         });
         
         document.getElementById('resetButton').addEventListener('click', function() {
             alert('却下');
         });
        </script>
        
        
        <p>
            <input type="checkbox" id="masterCheckbox" name="feature_enabled">
            <label for="masterCheckbox">Select all</label>
        </p>
        
        
        <table class ="coop">
            <thead>
                <tr>                           
                    <th>ドローンタイプ</th>
                    <th>ドローンの所有</th>                                                         
                </tr>
            </thead>
            <tbody>
                @foreach ($mergedData as $index => $droneInfo)
                    <tr>
                        <td>{{ $droneInfo['drone_type_id'] }}</td>
                        <td>{{ $droneInfo['possession_or_loan'] }}</td>                                  
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
