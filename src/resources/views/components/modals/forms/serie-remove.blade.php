<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-auto m-0 p-3 bg-white self-center rounded-md">
    <p>{{ $serie->name }}</p>
    <ul>
        <li>Image: {{ $serie->image }}</li>
        <li>Category: {{ $serie->category_id }}</li>
    </ul>
    <form id="{{ $serie->id }}" wire:submit.prevent="remove({{ $serie->id }})" method="POST">
        <h4 style="color:red;font-weight:bold">Sure you want to remove this serie?</h4>
    </form>
    <table>
        <tr align="center">
            <td>
                <x-secondary-button  @click.away="idmodal=null">
                    Cancel
                </x-secondary-button>
            </td>
            <td>
                <x-danger-button
                    class='px-2 py-1 mx-0 my-0'
                    @click.away="idmodal=null;"
                    form="{{ $serie->id }}"
                    type="submit"
                    name='confirm'
                    >
                    Delete
                </x-danger-button>
            </td>
        </tr>
    </table>
</div>
