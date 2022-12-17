<tbody>
    @foreach($categories as $category)
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
    <title>Categories List</title>
</head>
<body>
    <h1>Categories</h1>
    @if ($categories->count()>0)
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Error! categories not found! </p>
    @endif
</body>
</html>