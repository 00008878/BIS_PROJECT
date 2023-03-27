@php
    use App\Models\Application;
    use App\Models\Client;
    use App\Models\Passport;
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('admin.client-show')

@section('client-show')

    <div class="d-flex flex-column mt-4">
        @foreach($client->files as $file)
            <img src="{{ asset('files/' . $file->file_name) }}" alt="" width="250" height="150"/>
            <a href="{{ asset('files/' . $file->file_name) }}">{{ $file->file_name }}</a>

            <br>
        @endforeach
    </div>


@endsection


