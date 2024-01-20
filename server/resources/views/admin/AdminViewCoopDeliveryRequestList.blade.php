@extends('admin.app')

@section('title', '事業者宅配一覧')

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
$currentPage = 'adminViewCoopDeliveryRequestList'
@endphp

@section('content')
<div class = "main">
    <div class ="flex-main">            
        <p><h2><font color ="#408A7E"><u> 事業者宅配一覧 </u></font></h2></p>
        
        <select onChange="location.href=this.value;">
            <option>担当事業者を選択</option>
            @php
            $uniqueCompanies = collect($mergedData)->unique('delivery_company_name')->values();
            @endphp
            @foreach ($uniqueCompanies as $index => $deliveryInfo)
                <option value="{{ route('admin.adminViewCoopDeliveryRequestList', ['id' => $deliveryInfo['delivery_company_id']]) }}">{{ $deliveryInfo['delivery_company_name'] }}</option>
                @endforeach
        </select>
        <form action="{{ route('admin.adminViewCoopDeliveryRequestList', ['id' => '']) }}" method="GET" style="display: inline;">
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
                    <th>依頼番号</th>
                    <th>送り主情報</th>
                    <th>受け取り主情報</th>
                    <th>担当者事業者名</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>
            </thead>

            
            <tbody>
                @foreach ($mergedData as $index => $deliveryInfo)
                    <tr>
                        <td>
                            <input type="checkbox" class="itemCheckbox" id="checkbox{{$deliveryInfo['id']}}" name="selectedCoops[]" value="{{ $deliveryInfo['id'] }}">
                        </td>
                        <td>{{ $deliveryInfo['id'] }}</td>                                    
                        <td>{{ $deliveryInfo['user_id'] }}</td>
                        <td>{{ $deliveryInfo['delivery_destination_name'] }}</td>
                        <td>{{ $deliveryInfo['delivery_company_name'] }}</td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminEditUserInfo', ['id' => $deliveryInfo['id']]) }}">
                                <img src="{{ asset('image/img_edit.png') }}" alt="編集" width="20" height="20"></a></button></td>
                        <td><button type="button">
                            <a href="{{ route('admin.adminAllocateCoopDeliveryTaskDelete', ['id' => $deliveryInfo['id']]) }}">
                                <img src="{{ asset('image/img_delete.png') }}" alt="削除" width="20" height="20"></a></button></td>
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
