<x-list :searchBarPlaceholder="$editedId ? 'Type and hit enter to edit todo' : 'Type and hit enter to create todo'">
    @foreach ($todos as $id => $todo)
        <x-list-item :title="$todo['title']" :icon="$todo['completed'] ? 'check-circle' : 'circle'" :accessories="[['text' => $todo['completed']]]" :filtering="false">
            {{ $todo['pinned'] }}
            @if (!$query && !$editedId)
                <x-action-panel>
                    <x-action icon="archive" :title="$todo['completed'] ? 'Mark as not completed' : 'Mark as completed'" action="toggleCompleted({{ $id }})" index="0" />
                    <x-action icon="archive" title="Edit Todo" action="edit({{ $id }})" index="1" />
                    <x-action icon="archive" title="Delete Todo" action="remove({{ $id }})" index="2" />
                    <x-action icon="archive" title="Pin Todo" action="pin({{ $id }})" index="3" />
                    <x-action icon="archive" title="Clear complete todos" action="clearCompletedTodos" index="4" />
                    <x-action icon="archive" title="Delete all todos" action="removeAllTodos" wire:confirm="Delete all todos?" index="5" />
                </x-action-panel>
            @endif
        </x-list-item>
    @endforeach
    <x-action-panel :shouldRender="$editedId || $query">
        @if ($editedId)
            <x-action title="Apply edits" action="applyEdit({{ $editedId }})" index="0" />
            <x-action title="Cancel" action="cancelEdit" shortcut="escape" index="1" />
        @elseif ($query)
            <x-action title="Create todo" action="createTodo" index="0" />
        @endif
    </x-action-panel>
</x-list>