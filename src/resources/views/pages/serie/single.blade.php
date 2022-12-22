<x-main-layout>
<div class="text-center mt-8">
    @vite('resources/css/show-prod.css')
    @if ($serie)
        <h1 class='my-12 text-4xl font-bold'>{{ $serie->name }}</h1>
        <p>{{ $serie->plot }}</p>
        <table>
            </thead>
            <tbody>
                <tr>
                    <th>Image</th>
                    <td>{{ $serie->image }}</td>
                </tr>
                <tr>
                    <th>Opening Video</th>
                    <td>{{ $serie->opening_video }}</td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td>{{ $serie->year}}</td>
                </tr>
                <tr>
                    <th>Duration</th>
                    <td>{{ $serie->duration}} minutes</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('edit', $serie->id) }}"><button>edit</button></a>
        <a href="{{ route('delete', $serie->id) }}"><button>delete</button></a>
    @else
        <p>Series not found! </p>
    @endif
    <div>
        <a href="/">&#9664;Return</a>
    </div>
</div>
</x-main-layout>