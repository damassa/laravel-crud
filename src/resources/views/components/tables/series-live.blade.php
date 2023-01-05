<div x-data="{
    idmodal:null,
    orderColumn:@entangle('orderColumn'),
    orderAsc:@entangle('orderAsc'),
    start() {
        console.log({column:this.orderColumn, asc:this.orderAsc})
    },
    orderBy(column='id') {
        this.orderColumn = column
        this.orderAsc = !this.orderAsc
        console.log({order:this.orderColumn, asc:this.orderAsc})
        $wire.set('orderColumn', this.orderColumn)
        $wire.set('orderAsc', this.orderAsc)
        $wire.orderBy(this.orderColumn)
    }
}" x-init="start()">
@vite('resources/css/table.css')
<table class="table table-odd">
    <thead>
        <tr>
            <th><a href="#" @click=" orderBy()">ID</a></th>
            <th><a href="#" @click=" orderBy('name') ">Name</a></th>
            <th>Plot</th>
            <th>Image Card</th>
            <th>Opening Video</th>
            <th><a href="#" wire:click='orderByYear'>Year</a></th>
            <th>Duration</th>
            @if (Auth::user())
                <th colspan="2">Actions</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($series as $serie)
            <tr>
                @if (Auth::user())
                    <td><a href="{{ route('serie.single-dash', $serie->id) }}">{{ $serie->id }}</a></td>
                    <td><a href="{{ route('serie.single-dash', $serie->id) }}">{{ $serie->name }}</a></td>
                @else
                    <td><a href="/series/{{ $serie->id }}">{{ $serie->id }}</a></td>
                    <td><a href="/series/{{ $serie->id }}">{{ $serie->name }}</a></td>
                @endif

                <td>{{ substr($serie->plot, 0, 20)."..." }}</td>
                <td><img src="{{ $serie->image }}" alt="Serie"></td>
                <td><video width="250" height="150"><source type="video/youtube" src="{{ $serie->opening_video }}"></video></td>
                <td>{{ $serie->year }}</td>
                <td>{{ $serie->duration }} minutes</td>
                @if (Auth::user())
                    <td class='actions'>
                        {{-- <a href="{{ route('edit', $serie->id) }}">edit</a> --}}
                        <x-primary-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-upd-{{ $serie->id }}'">
                            Update
                        </x-primary-button>
                    </td>
                    <td class='actions'>
                        {{-- <a href="{{ route('delete', $serie->id) }}">delete</a> --}}
                        <x-danger-button class='px-2 py-1 mx-0 my-0'
                        @click=" idmodal = 'modal-rm-{{ $serie->id }}'">
                            Remove
                        </x-danger-button>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($series as $serie)
    <x-modals.serie-modal
        id="{{'modal-rm-'.$serie->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$serie->name.' ('.$serie->id.')'}}</x-slot>
        <x-modals.forms.serie-remove
            :serie="$serie"
            :category="Arr::first(
                Arr::where(
                    $categories,
                    fn($category)=>$category['id']===$serie->category_id
                )
            )"
        />
    </x-forms.serie-modal>
@endforeach
@foreach ($series as $serie)
    <x-modals.serie-modal
        id="{{'modal-upd-'.$serie->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$serie->name.' ('.$serie->id.')'}}</x-slot>
        <x-modals.forms.serie-update :serie="$serie" :categories="$categories"/>
    </x-forms.serie-modal>
@endforeach
<div>
