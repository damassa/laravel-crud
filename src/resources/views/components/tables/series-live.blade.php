<div x-data="{
    open: false,
    idmodal:null,
}">
<table {{ $attributes->merge(['class' => 'table table-' . $type]) }}>
    @vite('resources/css/table.css')
    <thead>
        <tr>
            <th><a href="#" wire:click='orderBy'>ID</a></th>
            <th><a href="#" wire:click='orderByName'>Name</a></th>
            <th>Plot</th>
            <th>Image Card</th>
            <th>Opening Video</th>
            <th><a href="#" wire:click='orderByYear'>Year</a></th>
            <th>Duration</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($series as $serie)
            <tr>
                @if (Auth::user())
                <div>
                    <input type="checkbox" class="read-more-state" id="{{$serie->id}}">
                </div>
                    <td><a href="{{ route('serie.single-dash', $serie->id) }}">{{ $serie->id }}</a></td>
                    <td><a href="{{ route('serie.single-dash', $serie->id) }}">{{ $serie->name }}</a></td>
                @else
                    <td><a href="/series/{{ $serie->id }}">{{ $serie->id }}</a></td>
                    <td><a href="/series/{{ $serie->id }}">{{ $serie->name }}</a></td>
                @endif

                <td>{{ $serie->plot }}</td>
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
        <x-modals.forms.serie-remove :serie="$serie"/>
    </x-forms.serie-modal>
@endforeach
@foreach ($series as $serie)
    <x-modals.serie-modal
        id="{{'modal-upd-'.$serie->id}}"
        trigger="idmodal"
        >
        <x-slot name="title">{{$serie->name.' ('.$serie->id.')'}}</x-slot>
        <x-modals.forms.serie-update :serie="$serie"/>
    </x-forms.serie-modal>
@endforeach
<div>