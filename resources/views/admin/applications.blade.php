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
<h1>Applications</h1>
<ul>
    @foreach($applications as $application)
        <li>{{ $application->id }}</li>
        <li>{{ $application->client->name }}</li>
        <li>{{ $application->client->surname }}</li>
        <li>{{ $application->service->type }}</li>
        <li>{{ $application->application_status }}</li>
        <li>{{ $application->created_at }}</li>
        <li><a href="{{ route('admin.application.show', ['application_id' => $application->id]) }}">Show</a></li>

        <br>
    @endforeach
</ul>

</body>
</html>
