<form wire:submit="submit" class="flex" x-data @keydown.enter.prevent>
    @foreach ($parameters as $parameter)
        <x-text-input type="text" 
            :id="$loop->first ? 'focus' : false" 
            :wire:model="'inputs.'.$loop->index" 
            :placeholder="$parameter" 
            :@keyup.enter.stop="!$loop->last ? '$el.nextElementSibling.focus()' : '$wire.submit()'" 
            :@keyup.escape.stop="!$loop->first ? '$el.previousElementSibling.focus()' : '$refs.search.focus()'" 
        />
    @endforeach
    <button @if ($parameters->isEmpty()) id="focus" @endif tabindex="-1" @focus="$wire.submit()"></button>
</form>
