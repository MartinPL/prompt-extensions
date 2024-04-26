<?php

namespace Extensions\TodoList;

use Illuminate\Support\Collection;

class TodoListCommand extends \Livewire\Component
{
    use \App\Items;

    public Collection $todos;
    
    public $editedId = false;

    public function mount()
    {
        $this->todos = TodoList::meta('items')->get()->sortByDesc('pinned');
    }

    public function createTodo()
    {
        $this->todos->pushWithMeta([
            'title' => $this->query, 
            'completed' => false, 
            'pinned' => false
        ], TodoList::meta('items'));
        $this->reset('query');
    }

    public function toggleCompleted($id)
    {
        $this->todos->updateWithMeta([
            ...$this->todos[$id], 'completed' => !$this->todos[$id]['completed']
        ], $id, TodoList::meta('items'));
    }

    public function remove($id)
    {
        $this->todos->forgetWithMeta($id, TodoList::meta('items'));
    }

    public function edit($id)
    {
        $this->query = $this->todos[$id]['title'];
        $this->editedId = $id;
    }

    public function applyEdit($id)
    {
        $this->todos->updateWithMeta([
            ...$this->todos[$id], 'title' => $this->query
        ], $id, TodoList::meta('items'));
        $this->cancelEdit();
    }

    public function cancelEdit()
    {
        $this->reset(['editedId', 'query']);
    }

    public function pin($id)
    {
        $item = [...$this->todos[$id], 'pinned' => !$this->todos[$id]['pinned']];
        $this->todos = $this->todos
            ->updateWithMeta($item, $id, TodoList::meta('items'))
            ->sortByDesc('pinned');
    }

    public function clearCompletedTodos()
    {
        foreach ($this->todos as $id => $todo) {
            if ($todo['completed']) {
                $this->todos->forgetWithMeta($id, TodoList::meta('items'));
            }
        }

        // TODO: Should be automatically
        if ($this->todos->count() - 1 < $this->selected) {
            $this->selected = $this->todos->count() - 1;
        }
    }

    public function removeAllTodos()
    {
        foreach ($this->todos as $id => $todo) {
            $this->todos->forgetWithMeta($id, TodoList::meta('items'));
        }
    }

    public function render()
    {
        return view('todo-list.todo-list-command');
    }
}
