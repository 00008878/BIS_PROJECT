@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layout.app')

@section('content')

@if(isset($message))
    <h1>{{$message}}</h1>
@endif
<h1><a href="{{ route('admin.applications.index') }}">Applications</a></h1>
<table class="table table-hover mt-4">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Service Type</th>
        <th scope="col">Application Status</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($applications as $application)
        <tr>
            <td>{{ $application->id }}</td>
            <td>{{ $application->client->name }}</td>
            <td>{{ $application->client->surname }}</td>
            <td>{{ $application->service->type }}</td>
            <td>{{ $application->application_status }}</td>
            <td>{{ $application->created_at }}</td>
            <td><a href="{{ route('admin.application.show', ['application_id' => $application->id]) }}" class="btn btn-primary">Show</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
