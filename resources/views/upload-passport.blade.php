<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <title>Test</title>
</head>
<body>
@if (Auth::check())
    <a href="/logout" class="btn btn-secondary">Выход</a>
@endif
@if(isset($message))
    <h1>{{$message}}</h1>
@endif
<form method="POST" action="{{ route('client.upload-passport', ['client_id' => request()->route()->parameters['client_id']]) }}" class="form-signin" enctype="multipart/form-data">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Please fill in the form</h1>
    <label for="inputImage" class="sr-only">Image</label>
    <input type="file" name="image" id="inputImage" class="form-control" placeholder="Image" required="" autofocus="">

    <label for="inputFileType" class="sr-only">File Type</label>
    <select name="file_type" id="inputFileType" class="form-control pb-2">
        <option value="passport">Passport</option>
        <option value="ID">ID</option>
    </select>

    <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Continue</button>
</form>
</body>
</html>
