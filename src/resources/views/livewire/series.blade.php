<div x-data="{ open: false }">
    @if (isset($series) && $series->count() > 0)
        <div style="display:flex; flex-direction: row; justify-content:flex-end">
            <button @click="open = true">Add new serie</button>
        </div>
        <div x-cloak>
            <div x-show="open"
                x-bind:class="!open ? 'hidden' :
                    'overflow-y-auto overflow-x-hidden pl-60 fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray-900/25'">

                <div class="flex rounded-md p-5 justify-center flex-col w-1/2 min-w-min pt-10 mt-10 bg-white"
                    @click.away="open = false">
                    <h1 class='text-center text-2xl font-bold'>Insert new serie</h1>
                    <form id=create @submit.prevent="$wire.save()" method="POST">
                        @csrf
                        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input wire:model='name' type="text" name="name" /></td>
                            </tr>
                            <tr>
                                <td>Plot:</td>
                                <td>
                                    <textarea wire:model='plot' name="plot" id="" cols="30" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Image:</td>
                                <td><input type="text" wire:model='image' name="image" /></td>
                            </tr>
                            <tr>
                                <td>Opening Video:</td>
                                <td><input type="text" wire:model='opening_video' name="opening_video" /></td>
                            </tr>
                            <tr>
                                <td>Year:</td>
                                <td><input wire:model='year' type="number" name="year" /></td>
                            </tr>
                            <tr>
                                <td>Duration:</td>
                                <td><input wire:model='duration' type="number" name="duration" /></td>
                            </tr>
                        </table>
                    </form>
                    {{-- <input type="submit" value="Create" form=create /> --}}
                    <div class='flex justify-center gap-24 w-full'>
                        <x-secondary-button @click="open=false" class='w-30'>Cancel</x-secondary-button>
                        <x-primary-button @click="open=false" class='w-30' form='create'>Create</x-primary-button>
                    </div>
                </div>
            </div>
        </div>
        <x-tables.series-live :series="$series" class='table-odd' type='hover' />
    @else
        <p>Series not found! </p>
    @endif
</div>