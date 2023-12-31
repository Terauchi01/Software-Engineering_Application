<form action="{{ route('admin.adminLoginFunction') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    ユーザー名
    <input type="text" name="user_name" required>
    パスワード
    <input type="password" name="password" required>
    <button type="submit" name="add">
        login
    </button>
</form>