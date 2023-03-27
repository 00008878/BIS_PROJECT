@php use Illuminate\Support\Facades\Auth; @endphp

@extends('layout.app')

@section('content')

@if(isset($message))
    <h1>{{$message}}</h1>
@endif
<h1><a href="{{ route('admin.clients.index') }}">Clients</a></h1>
<h3>Search</h3>
<form action="{{ route('admin.clients.index') }}" method="GET" class="col-md-6 d-flex">
    @csrf
    <input type="text" name="q" id="search" class="form-control mr-3">

    <select name="search_param" id="inputType" class="form-control pb-2 col-2 mr-3">
        <option value="phone">Phone</option>
        <option value="client_id">Client ID</option>
        <option value="pinfl">PINFL</option>
        <option value="fio">FIO</option>
        <option value="passport">Passport</option>
    </select>

    <button type="submit" class="btn btn-primary">Search</button>
</form>
<table class="table table-hover mt-4">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Patronymic</th>
        <th scope="col">Phone</th>
        <th scope="col">Client Status</th>
        <th scope="col">Created Date</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->surname }}</td>
            <td>{{ $client->patronymic }}</td>
            <td>{{ $client->phone }}</td>
            <td>{{ $client->client_status }}</td>
            <td>{{ $client->created_at }}</td>
            <td><a href="{{ route('admin.client.show.passport', ['client_id' => $client->id]) }}" class="btn btn-primary">Show</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
