@php
    use App\Models\Application;
    use App\Models\Client;
    use App\Models\Passport;
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('admin.client-show')

@section('client-show')

    <table class="table table-hover mt-4 col-6 table-bordered" style="font-size: 14px">
        <tbody>
        <tr>
            <th scope="col">Serial Number</th>
            <td>{{ $client->passport->serial_number }}</td>
        </tr>
        <tr>
            <th scope="col">PINFL</th>
            <td>{{ $client->passport->pinfl }}</td>
        </tr>
        <tr>
            <th scope="col">Name</th>
            <td>{{ $client->passport->name }}</td>
        </tr>
        <tr>
            <th scope="col">Surname</th>
            <td>{{ $client->passport->surname }}</td>
        </tr>
        <tr>
            <th scope="col">Patronymic</th>
            <td>{{ $client->passport->patronymic }}</td>
        </tr>
        <tr>
            <th scope="col">Birth Date</th>
            <td>{{ $client->passport->birth_date }}</td>
        </tr>
        <tr>
            <th scope="col">Gender</th>
            <td>{{ $client->passport->gender }}</td>
        </tr>
        <tr>
            <th scope="col">Address</th>
            <td>{{ $client->passport->address }}</td>
        </tr>
        <tr>
            <th scope="col">Issue Date</th>
            <td>{{ $client->passport->issue_date }}</td>
        </tr>
        <tr>
            <th scope="col">Expiry Date</th>
            <td>{{ $client->passport->expiry_date }}</td>
        </tr>
        <tr>
            <th scope="col">Region</th>
            <td>{{ $client->passport->region }}</td>
        </tr>
        <tr>
            <th scope="col">City Name</th>
            <td>{{ $client->passport->city_name }}</td>
        </tr>
        <tr>
            <th scope="col">Nationality</th>
            <td>{{ $client->passport->nationality_name }}</td>
        </tr>
        </tbody>
    </table>
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
    {{--<p>{{ $client->created_at }}</p>--}}
    {{--<p>{{ $client->updated_at }}</p>--}}

@endsection


