@php
    use App\Models\Client;
    use App\Models\ClientApplicationInvite;
@endphp

@extends('layout.app')

@section('content')
@if(isset($message))
    <h1>{{$message}}</h1>
@endif
<h1>Welcome, {{ Client::query()->where('user_id', auth()->user()->id)->first()->name }}</h1>
<h3>Please, <a href="{{route('services.all')}}">enter</a> to create notary deed</h3>
<h2>Applications</h2>
@if(count($client->applications) == 0)
    <p>You don't have applications</p>
@endif
@foreach($client->applications as $application)
    <p>{{ $application->id }}</p>
    <p>{{ $application->application_status }}</p>
@endforeach
@php /** @var ClientApplicationInvite $invitation */ @endphp
<h2>Invitations</h2>
@if(count($invitations) > 0)
    @foreach($invitations as $invitation)
        <a href="{{ route('application.session', ['application_id' => $invitation->application_id]) }}">Go to
            invitation</a>
    @endforeach
@else
    <p>You don't have invitations</p>
@endif

@endsection
