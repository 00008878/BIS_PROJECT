@extends('layout.app')

@section('content')

    <div style="font-size: 20px; line-height: 2">
        <h2>Service info</h2>
        <ol>
            <li><b>Category:</b> {{ $service->category }}</li>
            <li><b>Type of service</b>: {{ $service->type }}</li>
            <li><b>Price</b>: {{ $service->price }}</li>
            <li><b>Two-sided</b>: {{ $service->two_sided }}</li>
        </ol>

        <h2>Requirements</h2>
        <ol>
            @foreach($requirements as $requirement)
                <li>{{ $requirement->title }}</li>
            @endforeach
        </ol>
    </div>
    <form action="{{ route('application.create') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <button type="submit" class="btn btn-primary">Create Application</button>
    </form>

@endsection
