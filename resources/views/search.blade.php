<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <form action="{{ url('/search') }}" method="GET">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="author" placeholder="Author">
        <input type="submit" value="Search">
    </form>
    <br>
    <br>

    @foreach ($results as $res)
    <a href="{{ url('/book/' . $res->id) }}">
        <div>
            <h3>{{ $res->title }}</h3>
            @if ($res->description == null)
            <p>No description</p>
            @else
            <p>{{ $res->description }}</p>
            @endif
        </div>
        <br>
    </a>
    @endforeach
</body>
</html>