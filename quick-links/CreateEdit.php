<?php

namespace Extensions\QuickLinks;

use Livewire\Attributes\Validate;
use Extensions\QuickLinks\QuickLinks;

class CreateEdit extends \Livewire\Component
{
    use \App\Escape;

    public $id;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $link;

    public function mount($id = null)
    {
        if ($id) {
            ['title' => $this->name , 'url' => $this->link] = QuickLinks::meta('items')->get($id);
        }
    }

    public function save()
    {
        $validated = $this->validate();

        $value = [
            'title' => $validated['name'],
            'url' => $validated['link'],
        ];

        $editMode = $this->id;

        if ($editMode) {
            QuickLinks::meta('items')->save(id: $this->id, value: $value);
        }
 
        if (!$editMode) {
            QuickLinks::meta('items')->insert($value);
        }

        $this->redirectRoute('commands');
    }

    public function render()
    {
        return view('quick-links.create-edit');
    }
}
