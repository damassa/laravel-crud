<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Serie</title>
</head>

<body>
    <h1>Insert new Serie</h1>
    <form action="/serie" method="POST">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td>Plot:</td>
                <td><textarea name="plot" id="" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="text" name="image"/></td>
            </tr>
            <tr>
                <td>Opening Video:</td>
                <td><input type="text" name="opening_video"/></td>
            </tr>
            <tr>
                <td>Year:</td>
                <td><input type="text" name="year"/></td>
            </tr>
            <tr>
                <td>Duration:</td>
                <td><input type="text" name="duration"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Insert"/></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="/series" style="display: inline">&#9664;&nbsp;Return</a></td>
            </tr>
        </table>
    </form>
</body>

</html>