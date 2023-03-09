@php
    use App\Models\Client;use Illuminate\Support\Facades\Auth;
@endphp

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
@if(isset($message))
    <h1>{{$message}}</h1>
@endif
@php /** @var Client $client */ @endphp
<h1>{{ $client->name . ' ' . $client->surname . ' ' . $client->patronymic}}</h1>
<p>{{ $client->client_status }}</p>
<p>{{ $client->phone}}</p>
<p>{{ $client->birthdate}}</p>
<p>{{ $client->gender}}</p>
@foreach($client->files as $file)
    <p><a href="{{ asset('files/' . $file->file_name) }}">{{ $file->file_name }}</a></p>
@endforeach
<p>{{ $client->application }}</p>
@foreach($client->mib as $mib)
    <p>{{ $mib->debtor_name }}</p>
    <p>{{ $mib->debtor_pin }}</p>
    <p>{{ $mib->total_debt_sum }}</p>
    <p>{{ $mib->debt_type }}</p>
@endforeach
<p>{{ $client->passport }}</p>
<p>{{ $client->created_at }}</p>
<p>{{ $client->updated_at }}</p>

</body>
</html>
