@php
    use App\Models\ClientApplicationInvite;
@endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
@if(isset($message))
    <h1>{{$message}}</h1>
@endif
<h1>Welcome, {{ auth()->user()->name }}</h1>
<h3>Please, <a href="{{route('services.all')}}">enter</a> to create notary deed</h3>
<h2>Applications</h2>
@foreach($client->applications as $application)
    <p>{{ $application->id }}</p>
    <p>{{ $application->application_status }}</p>
@endforeach
@php /** @var ClientApplicationInvite $invitation */ @endphp
<h2>Invitations</h2>
@if(count($invitations) > 0)
    @foreach($invitations as $invitation)
        <a href="{{ route('application.session', ['application_id' => $invitation->application_id]) }}">Go to invitation</a>
    @endforeach
@endif
</body>
</html>
