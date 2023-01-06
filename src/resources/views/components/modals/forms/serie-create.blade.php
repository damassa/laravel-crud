<div x-cloak>
    <div x-show="open"
        x-bind:class="!open ? 'hidden' :
            'overflow-y-auto overflow-x-hidden flex justify-center fixed top-0 right-0 left-0 z-50 h-modal md:h-full bg-gray-900/25'"
        x-data="{
            categories:@js($categories),
            save(){
                if($refs.select.value==0)
                    return alert('Choose a valid category.')
                $wire.save()
                open=false
            },
        }">
        <div class="flex rounded-md p-5 flex-col justify-center w-fit min-w-min mt-10 bg-white"
            @click.away="open = false">
            <h1 class='text-center text-2xl font-bold pb-4 mb-4 border-b-2 border-gray-300'>New Serie</h1>
            <form @submit.prevent="save()" id="serie-create" >
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input wire:model.defer='serie.name' type="text" name="name" /></td>
                    </tr>
                    <tr>
                        <td>Plot:</td>
                        <td>
                            <textarea wire:model.defer='serie.plot' name="plot" id="" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Image Card:</td>
                        <td><input type="text" wire:model.defer='serie.image' name="image" /></td>
                    </tr>
                    <tr>
                        <td>Opening Video:</td>
                        <td><input type="text" wire:model.defer='serie.opening_video' name="opening_video" /></td>
                    </tr>
                    <tr>
                        <td>Year:</td>
                        <td><input wire:model.defer='serie.year' type="number" name="year" /></td>
                    </tr>
                    <tr>
                        <td>Duration:</td>
                        <td><input wire:model.defer='serie.duration' type="number" name="duration" /></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select x-ref="select" required min='1' name="category_id" wire:model.defer="serie.category_id">
                                <option value=0 selected placeholder>Choose a category:</option>
                                <template x-for="category in categories">
                                    <option x-bind:value="category.id" x-text="category.name">
                                </template>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
            <div class='flex mt-4 justify-center gap-24 w-full'>
                <x-secondary-button @click.="open=false" class='w-30'>Cancel</x-secondary-button>
                <x-primary-button class='w-30' form="serie-create">Create</x-primary-button>
            </div>
        </div>
    </div>
</div>
