<table {{$attributes->merge(['class'=>'table table-'.$type])}}>
    <thead style="background-color:gray; color:black">
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
            <tr style="background-color: lightgray">
                <td><a href="/series/{{ $serie->id }}">{{ $serie->id }}</a></td>
                <td>{{ $serie->name }}</td>
                <td>{{ $serie->plot }}</td>
                <td>{{ $serie->image }}</td>
                <td>{{ $serie->opening_video }}</td>
                <td>{{ $serie->year }}</td>
                <td>{{ $serie->duration }}</td>
                <td>
                    <a href="{{route('edit',$serie->id)}}">edit</a> |
                    <a href="{{route('delete',$serie->id)}}">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>