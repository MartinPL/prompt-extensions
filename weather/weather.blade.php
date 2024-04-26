<x-detail wire:init="load">
    @if ($weather)
        @dump($weather)
    @else
        spinner
    @endif
</x-detail>