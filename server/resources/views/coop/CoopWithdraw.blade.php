@csrf
<p>本当に退会しますか？</p>

<!-- Yesボタン -->
<a href="{{ route('coop.withdraw') }}">Yes</a>

<!-- Noボタン -->
<a href="{{ route('coop.coopViewUserDeliveryRequestList') }}">No</a>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif