<form action="{{ url('/login')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    メアド
    <input type="text" name="email" required>
    パスワード
    <input type="password" name="password" required>
    <button type="submit" name="add">
        login
    </button>
</form>