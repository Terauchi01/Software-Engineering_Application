@csrf
<p>本当に退会しますか？</p>

<!-- Yesボタン -->
<a href="{{ route('user.withdraw') }}">Yes</a>

<!-- Noボタン -->
<a href="{{ route('user.userDeliveryRequestList') }}">No</a>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif