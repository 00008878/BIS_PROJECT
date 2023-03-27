@php use App\Models\GaiReport; @endphp
@extends('admin.client-show')

@section('client-show')
    <div class="col-2 mt-4">
        <div class="d-flex justify-content-between">
            <p><a href="{{ route('admin.client.show.reports.mib', ['client_id' => $client->id]) }}"
                  class="btn btn-secondary" style="color: white">MIB</a></p>
            <p><a href="{{ route('admin.client.show.reports.gai', ['client_id' => $client->id]) }}"
                  class="btn btn-primary" style="color: white">GAI</a></p>
        </div>
    </div>
    <table class="table table-hover mt-4">
        <thead class="thead-light">
        <tr>
            <th scope="col">Licence Plate Number</th>
            <th scope="col">Car Mark</th>
            <th scope="col">Car Color</th>
            <th scope="col">Car Model</th>
            <th scope="col">Registration No</th>
            <th scope="col">Year of Manufacture</th>
            <th scope="col">Tech Inspect Date Start</th>
            <th scope="col">Tech Inspect Date End</th>
            <th scope="col">Report Created At</th>
        </tr>
        </thead>
        <tbody>
        @php
            /** @var GaiReport $gai */
        @endphp
        @foreach($client->gai as $gai)
            <tr>
                <td>{{ $gai->license_plate_num }}</td>
                <td>{{ $gai->car_mark }}</td>
                <td>{{ $gai->car_color }}</td>
                <td>{{ $gai->car_model }}</td>
                <td>{{ $gai->reg_no }}</td>
                <td>{{ $gai->year_of_manufacture }}</td>
                <td>{{ $gai->tech_inspect_date_start }}</td>
                <td>{{ $gai->tech_inspect_date_end }}</td>
                <td>{{ $gai->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


