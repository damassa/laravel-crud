<x-main-layout>
    <div class="container mx-auto">
        <div class="grid h-80 min-h-80 2xl:grid-cols-5 md:grid-cols-3 lg:grid-cols-4 sm:grid-cols-2 sm:gap-1 grid-cols-1 gap-5">
            @if (isset($series) && $series->count() > 0)
                @foreach ($series as $serie)
                    <x-cards.series :serie="$serie" />
                @endforeach
            @endif
        </div>
    </div>
</x-main-layout>