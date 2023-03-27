@php
    use App\Models\Application;use App\Models\Client;use Illuminate\Support\Facades\Auth;
@endphp

@extends('admin.client-show')

@section('client-show')

    <table class="table table-hover mt-4">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Service Type</th>
            <th scope="col">Service Price</th>
            <th scope="col">Application Status</th>
            <th scope="col">Created Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($client->applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->client->name . ' ' . $application->client->surname }}</td>
                <td>{{ $application->service->type }}</td>
                <td>{{ $application->service->price }}</td>
                <td>{{ $application->application_status }}</td>
                <td>{{ $application->created_at }}</td>
                <td><a href="{{ route('admin.application.show', ['application_id' => $application->id]) }}"
                       class="btn btn-primary">Show</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


