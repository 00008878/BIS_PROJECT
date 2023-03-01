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
    <ol>
        <li><b>Category:</b> {{ $service->category }}</li>
        <li><b>Type of service</b>: {{ $service->type }}</li>
        <li><b>Price</b>: {{ $service->price }}</li>
        <li><b>Two-sided</b>: {{ $service->two_sided }}</li>
    </ol>

    <ol>
        @foreach($requirements as $requirement)
            <li>{{ $requirement->title }}</li>
        @endforeach
    </ol>

    <form action="{{ route('application.create') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <input type="hidden" name="user_ud" value="{{ auth()->user()->id }}">
        <button type="submit">Create Application</button>
    </form>

</body>
</html>
