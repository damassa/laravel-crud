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
    <a href="/serie"><button>Add new serie</button></a>
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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
            <tr>
                <td><a href="/series/{{ $serie->id }}">{{ $serie->id }}</a></td>
                <td>{{ $serie->name }}</td>
                <td>{{ $serie->plot }}</td>
                <td>{{ $serie->image }}</td>
                <td>{{ $serie->opening_video }}</td>
                <td>{{ $serie->year }}</td>
                <td>{{ $serie->duration }}</td>
                <td><a href="{{route('edit',$serie->id)}}">edit</a> |
                    <a href="{{route('delete',$serie->id)}}">delete</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Error! Series not found! </p>
    @endif
</body>
</html>