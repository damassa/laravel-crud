<x-dash-layout>
    <h1>Edit serie</h1>
    <form id=edit action="{{route('update',$serie->id)}}" method="POST">
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
                <td><input type="number" name="year" value="{{ $serie->year }}"/></td>
            </tr>
            <tr>
                <td>Duration:</td>
                <td><input type="number" name="duration" value="{{ $serie->duration }}"/></td>
            </tr>
        </table>
    </form>
    <input form=edit type="submit" name='confirm' value="Save"/>
    <a href="/dashboard"><button>Cancel</button></a>
</x-dash-layout>