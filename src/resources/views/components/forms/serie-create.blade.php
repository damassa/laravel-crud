<div class=" w-fit h-auto m-2 p-3 drop-shadow-2xl bg-white self-center rounded-md pt-6">
    <h1 class="text-xl">Add new serie</h1>
    <!-- <form wire:submit.prevent="save" > -->
    <form @submit.prevent="$wire.save();">
        @csrf
        <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> -->
        <table>
            <tr>
                <td>Name:</td>
                <td><input wire:model="name" type="text" name="name" /></td>
            </tr>
            <tr>
                <td>Plot:</td>
                <td>
                    <textarea wire:model="plot" name="plot" id="" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input  wire:model="image" type="text" name="image" /></td>
            </tr>
            <tr>
                <td>Opening Video:</td>
                <td><input wire:model="opening_video" type="text" name="opening_video" /></td>
            </tr>
            <tr>
                <td>Year:</td>
                <td><input wire:model="year" type="number" name="year" /></td>
            </tr>
            <tr>
                <td>Duration:</td>
                <td><input wire:model="duration" type="number" name="duration" /></td>
            </tr>
        </table>
    </form>
    <table>
        <tr align="center">
            <td>
                <button @click="open=false" class='btn btn-danger'>
                    Cancel
                </button>
            </td>
            <td>
                <button wire:click="save" @click="open=false" class='btn btn-success bg-green-600'>
                    Add
                </button>
            </td>
        </tr>
    </table>
</div>