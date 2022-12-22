<div>
    <a href="{{ route('single', $serie->id) }}">
        <div
            class="w-64 h-80 py-3 mb-5 bg-green-400 border-2 border-blue-700 rounded-lg shadow-md shadow-green-700">
            <h3 class="text-center font-bold">{{ $serie->name }}</h3>
            <img src="{{ asset('storage/defaults/cards-thumbnail.jpg') }}" />
            <h4 class="text-center font-bold text-blue-800 shadow-text-gray-100">
                {{ $serie->year }}</h4>
            <p class="text-center">{{ $serie->duration }} minutes</p>
        </div>
    </a>
</div>