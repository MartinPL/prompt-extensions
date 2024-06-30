<x-list :searchBarPlaceholder="$editedId ? 'Type and hit enter to edit todo' : 'Type and hit enter to create todo'">
    @foreach ($todos as $id => $todo)
        <x-list-item :title="$todo['title']" :icon="$todo['completed'] ? 'check-circle' : 'circle'" :accessories="[['text' => $todo['completed']]]" :filtering="false">
            {{ $todo['pinned'] }}
            @if (!$query && !$editedId)
                <x-action-panel>
                    <x-action icon="archive" :title="$todo['completed'] ? 'Mark as not completed' : 'Mark as completed'" action="toggleCompleted({{ $id }})" />
                    <x-action icon="archive" title="Edit Todo" action="edit({{ $id }})" />
                    <x-action icon="archive" title="Delete Todo" action="remove({{ $id }})" />
                    <x-action icon="archive" title="Pin Todo" action="pin({{ $id }})" />
                    <x-action icon="archive" title="Clear complete todos" action="clearCompletedTodos" />
                    <x-action icon="archive" title="Delete all todos" action="removeAllTodos" wire:confirm="Delete all todos?" />
                </x-action-panel>
            @endif
        </x-list-item>
    @endforeach
    <x-action-panel :shouldRender="$editedId || $query">
        @if ($editedId)
            <x-action title="Apply edits" action="applyEdit({{ $editedId }})" />
            <x-action title="Cancel" action="cancelEdit" shortcut="escape" />
        @elseif ($query)
            <x-action title="Create todo" action="createTodo" />
        @endif
    </x-action-panel>
</x-list>