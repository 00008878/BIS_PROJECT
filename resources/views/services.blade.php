@php
    use Illuminate\Support\Collection;
    use App\Models\Service;
@endphp

@extends('layout.app')

@section('content')

    @php /** @var Collection|Service[] $services */ @endphp
    @foreach(Service::query()->select('category')->distinct()->get() as $category)
        <h3>{{ $category->category }}</h3>
        <ul>
            @foreach($services->where('category', $category->category) as $service)
                <li><a href="{{ route('services.show', ['id' => $service->id]) }}">{{$service->type}}</a></li>
            @endforeach
        </ul>
    @endforeach

@endsection
