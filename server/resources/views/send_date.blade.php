<form action="{{ url('/send_date/add')}}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <textarea class="red" rows="6" name="message"></textarea>
    <button type="submit" name="add">
     追加
    </button>
    hello
  </form>