@php use App\Models\Application; @endphp
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
@if($service->two_sided)
    <form action="" method="POST">
        @php /** @var Application $application */ @endphp
        @csrf
        <input type="hidden" name="application_id" value="{{ $application->id }}">
        <input type="hidden" name="client_id" value="{{ $application->client_id }}">
        <button type="submit">Invite second person</button>
    </form>
@endif

</body>
</html>
