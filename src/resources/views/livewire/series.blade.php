<div x-data="{ open: false }" class="flex justify-center">
    <x-modals.forms.serie-create />
    <div class="w-full lg:w-5/6">
        <div class="py-3 pr-5 flex justify-start">
            <x-primary-button @click=" open = true ">New Serie</x-primary-button>
        </div>
        @if (isset($listSeries) && count($listSeries)>0)
            <x-tables.series-live :series="$listSeries" class="table-odd" />
        @else
            <p>Series not found!</p>
        @endif
    </div>
</div>
