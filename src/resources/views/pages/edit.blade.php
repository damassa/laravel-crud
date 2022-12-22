<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Series</title>
</head>

<body>
    <h1>Updating Serie</h1>
    <form action="{{route('update',$serie->id)}}" method="POST">
        @csrf
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value="{{$serie->name}}"/></td>
            </tr>
            <tr>
                <td>Plot:</td>
                <td><textarea name="plot" id="" cols="30" rows="10">{{$serie->plot}}</textarea></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="text" name="image" value="{{$serie->image}}"/></td>
            </tr>
            <tr>
                <td>Opening Video:</td>
                <td><input type="text" name="opening_video" value="{{$serie->opening_video}}"/></td>
            </tr>
            <tr>
                <td>Year:</td>
                <td><input type="text" name="year" value="{{$serie->year}}"/></td>
            </tr>
            <tr>
                <td>Duration:</td>
                <td><input type="text" name="duration" value="{{$serie->duration}}"></td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <input type="submit" name='confirm' value="Save"/>
                    <input type="submit" name='cancel' value="Cancel"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>