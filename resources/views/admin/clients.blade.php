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
<h1>Clients</h1>
<ul>
    @foreach($clients as $client)
        <li>{{ $client->id }}</li>
        <li>{{ $client->name }}</li>
        <li>{{ $client->surname }}</li>
        <li>{{ $client->patronymic }}</li>
        <li>{{ $client->phone }}</li>
        <li>{{ $client->client_status }}</li>

        <br>
    @endforeach
</ul>

</body>
</html>
