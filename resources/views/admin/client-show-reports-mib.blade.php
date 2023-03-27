@extends('admin.client-show')

@section('client-show')
    <div class="col-2 mt-4">
        <div class="d-flex justify-content-between">
            <p><a href="{{ route('admin.client.show.reports.mib', ['client_id' => $client->id]) }}" class="btn btn-primary" style="color: white">MIB</a></p>
            <p><a href="{{ route('admin.client.show.reports.gai', ['client_id' => $client->id]) }}" class="btn btn-secondary" style="color: white">GAI</a></p>
        </div>
    </div>
    <table class="table table-hover mt-4">
        <thead class="thead-light">
        <tr>
            <th scope="col">Debtor's Name</th>
            <th scope="col">Debtor's PINFL</th>
            <th scope="col">Total Debt Sum</th>
            <th scope="col">Debt Type</th>
            <th scope="col">Created Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($client->mib as $mib)
            <tr>
                <td>{{ $mib->debtor_name }}</td>
                <td>{{ $mib->debtor_pin }}</td>
                <td>{{ $mib->total_debt_sum }}</td>
                <td>{{ $mib->debt_type }}</td>
                <td>{{ $mib->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


