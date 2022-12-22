<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series List</title>
</head>
<body>
    @if ($serie)
        <h1>{{ $serie->name }}</h1>
        <p>{{ $serie->plot }}</p>
        <p>{{ $serie->image }}</p>
        <p>{{ $serie->opening_video }}</p>
        <p>{{ $serie->year }}</p>
        <p>{{ $serie->duration }} minutes</p>
    @else
        <p>Series não encontrados! </p>
    @endif
    <a href="/series">&#9664;Return</a>
</body>
</html>