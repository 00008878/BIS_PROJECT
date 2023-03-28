@php use App\Models\Application;
use Illuminate\Support\Facades\Auth;
/** @var Application $application */
@endphp

@extends('layout.app')

@section('content')

@if(isset($message))
    <h1>{{$message}}</h1>
@endif

<h1><a href="{{ route('admin.client.show.passport', ['client_id' => $application->client_id]) }}" style="color: black">{{ $application->client->name . ' ' . $application->client->surname . ' ' . $application->client->patronymic}}</a></h1>
<div class="d-flex justify-content-between col-3">
    <p>{{ $application->application_status }}</p>
    <form action="{{ route('application.status.change') }}" method="POST">
        @csrf
        <input type="hidden" name="application_status" id="" value="APPROVE">
        <input type="hidden" name="application_id" id="" value="{{ $application->id }}">

        <button type="submit" class="btn btn-success">Approve</button>
    </form>

    <form action="{{ route('application.status.change') }}" method="POST">
        @csrf
        <input type="hidden" name="application_status" id="" value="REJECT">
        <input type="hidden" name="application_id" id="" value="{{ $application->id }}">

        <button type="submit" class="btn btn-danger">REJECT</button>
    </form>
</div>

<table class="table table-hover mt-4 col-6 table-bordered" style="font-size: 14px">
    <tbody>
    <tr>
        <th scope="col">Service type</th>
        <td>{{ $application->service->type }}</td>
    </tr>
    <tr>
        <th scope="col">Service category</th>
        <td>{{ $application->service->category }}</td>
    </tr>
    <tr>
        <th scope="col">Service price</th>
        <td>{{ $application->service->price }}</td>
    </tr>
    <tr>
        <th scope="col">Two sided</th>
        <td>{{ $application->service->two_sided == 0 ? 'no' : 'yes' }}</td>
    </tr>
    <tr>
        <th scope="col">Application created at</th>
        <td>{{ $application->created_at }}</td>
    </tr>
    <tr>
        <th scope="col">Application updated at</th>
        <td>{{ $application->updated_at }}</td>
    </tr>
    </tbody>
</table>

<h3>Files</h3>
<div class="d-flex mt-4 col-6 justify-content-between">
    @foreach($application->files as $file)
        <div class="d-flex flex-column">
            <img src="{{ asset('files/' . $file->file_name) }}" alt="" width="250" height="150"/>
            <a href="{{ asset('files/' . $file->file_name) }}">{{ $file->file_name }}</a>
        </div>
        <br>
    @endforeach
</div>

@endsection
