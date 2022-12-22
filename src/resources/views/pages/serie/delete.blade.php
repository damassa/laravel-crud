<x-dash-layout>
    @if ($serie)
        <h1>{{ $serie->name }}</h1>
        <p>{{ $serie->plot }}</p>
        <ul>
            <li>Image: {{ $serie->image }}</li>
            <li>Opening Video: {{ $serie->opening_video }}</li>
            <li>Year: {{ $serie->year }}</li>
            <li>Duration: {{ $serie->duration }}</li>
        </ul>
        <form action="{{ route('remove', $serie->id) }}" method="post">
            @csrf
            <h4 style="color:red;font-weight:bold">Are you sure you want to delete this serie?</h4>
            <input type="submit" name='confirm' value="Delete" />
            <input type="submit" name='confirm' value="Cancel" />
        </form>
    @else
        <p>Series not found! </p>
        <a href="/dashboard">&#9664;Return</a>
    @endif
</x-dash-layout>