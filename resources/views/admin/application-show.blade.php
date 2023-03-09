@php use App\Models\Application;
use Illuminate\Support\Facades\Auth;
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
@php /** @var Application $application */ @endphp
<h1>{{ $application->client->name . ' ' . $application->client->surname . ' ' . $application->client->patronymic}}</h1>
<p>{{ $application->application_status }}</p>
<p>{{ $application->reject_reason}}</p>
@foreach($application->files as $file)
    <p><a href="{{ asset('files/' . $file->file_name) }}">{{ $file->file_name }}</a></p>
@endforeach
<p>{{ $application->service->type }}</p>
<p>{{ $application->service->category }}</p>
<p>{{ $application->service->price }}</p>
<p>{{ $application->service->two_sided == 0 ? 'no' : 'yes' }}</p>
<p>{{ $application->created_at }}</p>
<p>{{ $application->updated_at }}</p>

<a href="{{ route('admin.client.show', ['client_id' => $application->client_id]) }}">Go to client</a>

</body>
</html>
