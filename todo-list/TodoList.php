<?php

namespace Extensions\TodoList;

class TodoList extends \App\Extension
{
    public $title = 'Todo list';

    public function register()
    {
        $this->command('Todo list')
            ->livewire(TodoListCommand::class);
    }
}
