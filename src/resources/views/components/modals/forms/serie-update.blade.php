{{-- <div class=" w-fit h-auto m-2 p-3 drop-shadow-2xl bg-white self-center rounded-md pt-6"> --}}
<div class="flex flex-col justify-center w-fit shadow dark:bg-gray-700 h-fit m-0 p-3 bg-white self-center rounded-md">
    <div x-data="{
        serie: @js($serie),
        categories:@js($categories)
        update() {
            this.serie.year = Number(this.serie.year)
            this.serie.duration = Number(this.serie.duration)
            this.serie.category_id = +this.serie.category_id
            if (this.serie.year &&
                this.serie.duration) {
                console.log({ serie: this.serie });
                $wire.update(this.serie)
            } else {
                alert('Error while updating serie!')
            }
        },
    }">
        <form @submit.prevent="update()" id="serie-update-{{ $serie->id }}">
            {{-- @csrf --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"/> --}}
            {{-- <input x-model="serie.id" type="hidden" name="id" value={{$serie->id}} /> --}}
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input x-model="serie.name" type="text" name="name" /></td>
                </tr>
                <tr>
                    <td>Plot:</td>
                    <td>
                        <textarea x-model="serie.plot" name="plot" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Image:</td>
                    <td><input x-model="serie.image" step=1 type="text" name="image" /></td>
                </tr>
                <tr>
                    <td>Opening Video:</td>
                    <td><input x-model="serie.opening_video" step=0.01 id="" type="text" name="opening_video" /></td>
                </tr>
                <tr>
                    <td>Year:</td>
                    <td><input x-model="serie.year" type="number" name="year" /></td>
                </tr>
                <tr>
                    <td>Duration:</td>
                    <td><input x-model="serie.duration" type="number" name="duration" /></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select x-ref="select" required min='1' name="category" x-model="serie.category_id">
                            <template x-for="category in categories">
                                <option
                                    x-bind:selected="category.id === serie.category_id"
                                    x-bind:value="category.id"
                                    x-text="category.nome"
                                />
                            </template>
                        </select>
                    </td>
                </tr>
            </table>
        </form>
        <div class='flex justify-center gap-24 w-full'>
            <x-secondary-button @click=" idmodal=null ">
                Cancel
            </x-secondary-button>
            <x-primary-button form="serie-update-{{ $serie->id }}" @click=" idmodal=null ">
                Update
            </x-primary-button>
        </div>
    </div>
</div>
