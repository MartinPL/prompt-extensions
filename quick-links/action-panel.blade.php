<x-action-panel>
    <x-action title="Open Command" href="#focus" />
    <x-action.command title="Edit quicklink" target="edit-quick-link/{{ $id }}" />
    <x-action.command title="Delete quicklink" target="remove-quick-link/{{ $id }}" shortcut="delete" />
</x-action-panel>