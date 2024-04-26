<?php

namespace Extensions\QuickLinks;

use Livewire\Attributes\Validate;
use Extensions\QuickLinks\QuickLinks;

class ItemOptions extends \Livewire\Component
{
    public $id;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $link;

    public function mount($id = null)
    {
        ['title' => $this->name , 'url' => $this->link] = QuickLinks::meta('items')->get($id);
    }

    public function updated()
    {
        $validated = $this->validate();

        $value = [
            'title' => $validated['name'],
            'url' => $validated['link'],
        ];

        QuickLinks::meta('items')->save(id: $this->id, value: $value);
    }

    public function render()
    {
        return view('quick-links.item-options');
    }
}
