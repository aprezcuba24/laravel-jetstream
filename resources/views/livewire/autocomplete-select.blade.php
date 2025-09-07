<div class="relative">
    <input 
        type="text" 
        class="w-full border rounded p-2"
        placeholder="Find..."
        wire:model.live.debounce.300ms="query"
    />
    @if(!empty($this->results))
        <ul class="absolute z-10 w-full bg-white border rounded mt-1 max-h-60 overflow-y-auto">
            @foreach($this->results as $row)
                <li 
                    class="p-2 hover:bg-blue-100 cursor-pointer"
                    wire:click="select({{ $row->id }})"
                >
                    {{ $row->{$searchField} }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
