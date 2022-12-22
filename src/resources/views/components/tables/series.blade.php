<table {{$attributes->merge(['class'=>'table table-'.$type])}}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Plot</th>
            <th>Image Card</th>
            <th>Opening Video</th>
            <th>Year</th>
            <th>Duration</th>
            @if(Auth::user() && Route::is('dashboard'))
                <th>Actions</th>
            @endif
        </tr>
    </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    @if(Auth::user() && Route::is('dashboard'))
                        <td><a href="{{route('serie.single-dash', $serie->id)}}">{{ $serie->id }}</a></td>
                        <td><a href="{{route('serie.single-dash', $serie->id)}}">{{ $serie->name }}</a></td>
                    @else
                        <td><a href="/series/{{ $serie->id }}">{{ $serie->id }}</a></td>    
                        <td><a href="/series/{{ $serie->id }}">{{ $serie->name }}</a></td>    
                    @endif
                    
                    <td>{{ $serie->plot }}</td>
                    <td>{{ $serie->image }}</td>
                    <td>{{ $serie->opening_video }}</td>
                    <td>{{ $serie->year }}</td>
                    <td>{{ $serie->duration }}</td>

                    @if(Auth::user() && Route::is('dashboard'))
                        <td>
                            <a href="{{ route('edit', $serie->id) }}">edit</a> |
                            <a href="{{ route('delete', $serie->id) }}">delete</a>
                        </td>
                    @endif    
                </tr>
        @endforeach
    </tbody>
</table>