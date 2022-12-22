<x-main-layout>
    <h2>Series</h2>
    @if ($series->count() > 0)
        <x-tables.series :series="$series" class='table-odd' type='hover' />
        <div style="display:flex; flex-direction: row; justify-content:flex-end">
            <a href="/serie"><button>Add new serie</button></a>
        </div>
    @else
        <p>Series not found!</p>
    @endif        
</x-main-layout>