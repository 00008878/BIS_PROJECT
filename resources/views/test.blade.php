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
<form action="/post-test" method="post">
    @csrf
    <label> name
        <input name="name" type="text">
    </label>
    <label> email
        <input name="email" type="text">
    </label>
    <label> password
        <input name="password" type="text">
    </label>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
