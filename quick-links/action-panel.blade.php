<x-action-panel>
    <x-action title="Open Command" href="#focus" index="0" />
    <x-action.command title="Edit quicklink" target="edit-quick-link/{{ $id }}" index="1" />
    <x-action.command title="Delete quicklink" target="remove-quick-link/{{ $id }}" shortcut="delete" index="2" />
</x-action-panel>