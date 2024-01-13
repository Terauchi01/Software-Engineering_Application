<form action="{{ route('user.userEdit') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    メアド
    <input type="text" name="email_address" value="{{ $user->email_address }}" required><br>
    パスワード
    <input type="password" name="password" required><br>
    postal_code
    <input type="text" name="postal_code" value="{{ $user->postal_code }}" required><br>
    prefecture_id
    <input type="text" name="prefecture_id" value="{{ $user->prefecture_id }}" required><br>
    city_id
    <input type="text" name="city_id" value="{{ $user->city_id }}" required><br>
    town
    <input type="text" name="town" value="{{ $user->town }}" required><br>
    block
    <input type="text" name="block" value="{{ $user->block }}" required><br>
    phone_number
    <input type="text" name="phone_number" value="{{ $user->phone_number }}" required><br>
    user_last_name
    <input type="text" name="user_last_name" value="{{ $user->user_last_name }}" required><br>
    user_first_name
    <input type="text" name="user_first_name" value="{{ $user->user_first_name }}" required><br>
    user_last_name_kana
    <input type="text" name="user_last_name_kana" value="{{ $user->user_last_name_kana }}" required><br>
    user_first_name_kana
    <input type="text" name="user_first_name_kana" value="{{ $user->user_first_name_kana }}" required><br>
    unpaid_charge
    <input type="text" name="unpaid_charge" value="{{ $user->unpaid_charge }}" required><br>
    <button type="submit" name="update"><br>
        更新
    </button>
</form>
