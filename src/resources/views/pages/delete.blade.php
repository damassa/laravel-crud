<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Serie</title>
</head>
<body>
    @if ($serie)
        <h1>{{ $serie->name }}</h1>
        <p>{{ $serie->plot }}</p>
        <p>{{ $serie->image }}</p>
        <p>{{ $serie->opening_video }}</p>
        <p>{{ $serie->year }}</p>
        <p>{{ $serie->duration }}</p>
        <form action="{{route('remove',$serie->id)}}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Sure you want to delete this serie?</h4>
            <table>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" name='confirm' value="Delete"/>
                        <input type="submit" name='confirm' value="Cancel"/>
                    </td>
                </tr>
            </table>
        </form>
    @else
        <p>Series not found! </p>
        <a href="/series">&#9664;Return</a>
    @endif
</body>
</html>