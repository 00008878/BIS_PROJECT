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
<h4>Please, <a href="{{route('services.all')}}">enter</a> to create notary deed</h4>
<h3>Applications</h3>
@if(count($client->applications) > 0)
    <table class="table table-hover mt-4">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Service Type</th>
            <th scope="col">Application Status</th>
            <th scope="col">Created Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($client->applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->service->type }}</td>
                <td>{{ $application->application_status }}</td>
                <td>{{ $application->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>You don't have applications</p>
@endif

@php /** @var ClientApplicationInvite $invitation */ @endphp
<h3>Invitations</h3>
@if(count($invitations) > 0)
    <table class="table table-hover mt-4">
        <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invitations as $invitation)
            <tr>
                <td>{{ $invitation->id }}</td>
                <td>{{ $invitation->client_from->name . ' ' . $invitation->client_from->surname}}</td>
                <td>{{ $invitation->client_to->name . ' ' . $invitation->client_to->surname}}</td>
                <td>{{ $invitation->active == 1 ? 'Active' : 'Not active' }}</td>
                @if($invitation->active)
                    <td><a href="{{ route('application.session', ['application_id' => $invitation->application_id]) }}">Go to invitation</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

@else
    <p>You don't have invitations</p>
@endif

@endsection
