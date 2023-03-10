<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <title>Login</title>
</head>
<body class="text-center" data-new-gr-c-s-check-loaded="14.1093.0" data-gr-ext-installed="">
<form method="POST" action="{{ route('signup') }}" class="form-signin">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Please register</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="name" id="inputName" class="form-control" placeholder="Name" required="" autofocus="">
    <label for="inputSurname" class="sr-only">Surname</label>
    <input type="text" name="surname" id="inputSurname" class="form-control" placeholder="Surname" required="" autofocus="">
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>
</body>
</html>
