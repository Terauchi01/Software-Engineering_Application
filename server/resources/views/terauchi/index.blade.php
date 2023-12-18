<!-- resources/views/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello Page</title>
</head>
{{-- {{$AccountInformation}}
{{$AdminInformation}}
{{$AdminUser}}
{{$ChildAccount}}
{{$CoopDrones}}
{{$CoopLocation}}
{{$CoopUser}}
{{$DeliveryLocationImage}}
{{$DeliveryRequest}}
{{$DroneType}}
{{$Favorite}}
{{$LicenseInformation}} --}}
{{-- @foreach ($User as $user)
    @foreach ($user->getAttributes() as $key => $value)
        <p>{{ $value }}</p>
    @endforeach
@endforeach --}}
{{$User}}
<a href="{{ route('terauchi.list_view') }}">Terauchi list</a>

<body>
</body>
</html>
