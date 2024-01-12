UserRegistration
<form action="{{ route('user.userRegister') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    メアド
    <input type="text" name="email_address" required><br>
    パスワード
    <input type="password" name="password" required><br>
    postal_code
    <input type="text" name="postal_code" required><br>
    prefecture_id
    <input type="text" name="prefecture_id" required><br>
    city_id
    <input type="text" name="city_id" required><br>
    town
    <input type="text" name="town" required><br>
    block
    <input type="text" name="block" required><br>
    phone_number
    <input type="text" name="phone_number" required><br>
    user_last_name
    <input type="text" name="user_last_name" required><br>
    user_first_name
    <input type="text" name="user_first_name" required><br>
    user_last_name_kana
    <input type="text" name="user_last_name_kana" required><br>
    user_first_name_kana
    <input type="text" name="user_first_name_kana" required><br>
    unpaid_charge
    <input type="text" name="unpaid_charge" required><br>
    <button type="submit" name="add"><br>
        登録
    </button>
</form>