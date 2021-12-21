<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <form action="{{ url('/search') }}">
        <input type="text" name="title">
    </form>
    @foreach ($results as $res)
    <a href="{{ url('/book/' . $res->id) }}">{{ $res->title }}</a>
    @endforeach
</body>
</html>