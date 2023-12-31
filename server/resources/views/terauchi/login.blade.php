admin
<form action="{{ url('/loginAdmin')}}" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  メアド
  <input type="text" name="email" required>
  パスワード
  <input type="password" name="password" required>
  <button type="submit" name="add">
      login
  </button>
</form>
coop
<form action="{{ url('/loginCoop')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    メアド
    <input type="text" name="email" required>
    パスワード
    <input type="password" name="password" required>
    <button type="submit" name="add">
        login
    </button>
  </form>
user
<form action="{{ route('terauchi.loginUser')}}" method="POST" class="form-horizontal">
  {{ csrf_field() }}
  メアド
  <input type="text" name="email" required>
  パスワード
  <input type="password" name="password" required>
  <button type="submit" name="add">
      login
  </button>
</form>
  <a href="{{ route('terauchi.top') }}">topに戻る</a>