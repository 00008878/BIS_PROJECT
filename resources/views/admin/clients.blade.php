@php use Illuminate\Support\Facades\Auth; @endphp
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
<h1><a href="{{ route('admin.clients.index') }}">Clients</a></h1>
<form action="{{ route('admin.clients.index') }}" method="GET">
    @csrf
    <label for="search">Search</label>
    <input type="text" name="q" id="search" class="form-control">

    <select name="search_param" id="inputType" class="form-control pb-2">
        <option value="phone">Phone</option>
        <option value="client_id">Client ID</option>
        <option value="pinfl">PINFL</option>
        <option value="fio">FIO</option>
        <option value="passport">Passport</option>
    </select>

    <button type="submit">Search</button>
</form>
<ul>
    @foreach($clients as $client)
        <li>{{ $client->id }}</li>
        <li>{{ $client->name }}</li>
        <li>{{ $client->surname }}</li>
        <li>{{ $client->patronymic }}</li>
        <li>{{ $client->phone }}</li>
        <li>{{ $client->client_status }}</li>
        <li>{{ $client->created_at }}</li>
        <li><a href="{{ route('admin.client.show', ['client_id' => $client->id]) }}">Show</a></li>

        <br>
    @endforeach
</ul>

</body>
</html>
