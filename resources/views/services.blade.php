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
<ul>
    @foreach($types as $type)
        <li>{{$type->type_name}}</li>
    @endforeach
</ul>
{{--<h3>Please, <a href="{{route('services')}}">enter</a> to create notary deed</h3>--}}
</body>
</html>