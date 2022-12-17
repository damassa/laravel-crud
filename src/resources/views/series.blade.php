<tbody>
    @foreach($series as $serie)
    <tr>
        
    </tr>
    @endforeach
</tbody>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series List</title>
</head>
<body>
    <h1>Series</h1>
    @if ($series->count()>0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Plot</th>
                <th>Image Card</th>
                <th>Opening Video</th>
                <th>Year</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
            <tr>
                <td>{{ $serie->id }}</td>
                <td>{{ $serie->name }}</td>
                <td>{{ $serie->plot }}</td>
                <td>{{ $serie->image }}</td>
                <td>{{ $serie->opening_video }}</td>
                <td>{{ $serie->year }}</td>
                <td>{{ $serie->duration }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Error! Series not found! </p>
    @endif
</body>
</html>