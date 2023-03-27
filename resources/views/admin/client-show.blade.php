@php
    use App\Models\Application;use App\Models\Client;use Illuminate\Support\Facades\Auth;
@endphp

@extends('layout.app')

@section('content')

@if(isset($message))
    <h1>{{$message}}</h1>
@endif
@php
    /** @var Client $client */
    /** @var Application $application */
@endphp
<h1>{{ $client->name . ' ' . $client->surname . ' ' . $client->patronymic}}</h1>
<div class="col-6 mt-4">
    <div class="d-flex justify-content-between" style="border-bottom: 2px solid slategrey">
        <h5><a href="{{ route('admin.client.show.passport', ['client_id' => $client->id]) }}" style="color: slategrey">Passport</a></h5>
        <h5><a href="{{ route('admin.client.show.applications', ['client_id' => $client->id]) }}" style="color: slategrey">Applications</a></h5>
        <h5><a href="{{ route('admin.client.show.files', ['client_id' => $client->id]) }}" style="color: slategrey">Files</a></h5>
        <h5><a href="{{ route('admin.client.show.reports.mib', ['client_id' => $client->id]) }}" style="color: slategrey">Reports</a></h5>
    </div>
</div>

@yield('client-show')

@endsection


{{--<p>{{ $client->phone}}</p>--}}
{{--<p>{{ $client->birthdate}}</p>--}}
{{--<p>{{ $client->gender}}</p>--}}
{{--@foreach($client->files as $file)--}}
{{--    <p><a href="{{ asset('files/' . $file->file_name) }}">{{ $file->file_name }}</a></p>--}}
{{--@endforeach--}}
{{--@foreach($client->applications as $application)--}}
{{--    <p>{{ $application->id }}</p>--}}
{{--    <p><a href="{{ route('admin.application.show', ['application_id' => $application->id]) }}">Go</a></p>--}}
{{--@endforeach--}}

{{--@foreach($client->mib as $mib)--}}
{{--    <p>{{ $mib->debtor_name }}</p>--}}
{{--    <p>{{ $mib->debtor_pin }}</p>--}}
{{--    <p>{{ $mib->total_debt_sum }}</p>--}}
{{--    <p>{{ $mib->debt_type }}</p>--}}
{{--@endforeach--}}
{{--<p>{{ $client->passport }}</p>--}}
{{--<p>{{ $client->created_at }}</p>--}}
{{--<p>{{ $client->updated_at }}</p>--}}
