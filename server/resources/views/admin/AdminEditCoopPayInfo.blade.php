<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>事業者情報詳細</title>
        <link rel="stylesheet" href="{{ asset('/css/admin/AdminViewCoopPayInfo.css') }}">
    </head>
    <body>
        <div class = "header">
            <select onChange="location.href=value;">
                <option>管理者</option>
                <option value="{{ route('admin.adminLogout') }}">ログアウト</option>
            </select>
            <p>admin</p> <!-- ここをユーザ名とする -->
        </div>

        <nav class="side">
            <div class="current">
                <p><a href="{{ route('admin.adminViewCoopList') }}">事業者情報管理</a></p>
            </div>
            <p><a href="{{ route('admin.adminViewCoopDroneInfo') }}">ドローン貸与申請一覧</a></p>
            <p><a href="{{ route('admin.adminViewUserList') }}">利用者情報管理</a></p>
            <p><a href="{{ route('admin.adminViewCoopStatisticsInfo') }}">事業者情報分析</a></p>
            <p><a href="{{ route('admin.adminViewUserStatisticsInfo') }}">利用者情報分析</a></p>
            <p><a href="{{ route('admin.adminAllocateCoopDeliveryTask') }}">宅配依頼一覧</a></p>
        </nav>

        <div class="pay">
            <p class="information"><h2><font color="#408A7E"><u>事業者支払い情報編集</u></font></h2></p>
            <p class="coopName">{{ $coopName }}</p>
            @if($coopId !== null)
            <p class="coopId">ID : {{ $coopId }}</p>
            <form action="{{ route('admin.adminEditCoopPayInfoApply') }}" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>支払い情報</th>
                        <th><div class="left"><input type="text" name="pay" value="{{ $data['pay'] }}">円</div></th>
                    </tr>
                    <tr>
                        <th>銀行名</th>
                        <th>{{ $data['bank'] }}</th>
                    </tr>
                    <tr>
                        <th>支店名</th>
                        <th>{{ $data['branch'] }}</th>
                    </tr>
                    <tr>
                        <th>口座種別</th>
                        <th>{{ $data['type'] }}</th>
                    </tr>
                    <tr>
                        <th>口座番号</th>
                        <th>{{ $data['number'] }}</th>
                    </tr>
                    <tr>
                        <th>口座名義人</th>
                        <th>{{ $data['name'] }}</th>
                    </tr>
                </table>
                <input type="hidden" name="id" value="{{ $coopId }}">
                <div class="confirm">
                    <button type="submit">上記内容で更新する</button>
                </div>
            </form>
            @endif
        </div>
    </body>
</html>
