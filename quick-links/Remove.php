<?php

namespace Extensions\QuickLinks;

class Remove extends \Livewire\Component
{
    public function mount($id)
    {
        QuickLinks::meta('items')->delete(id: $id);
        $this->redirectRoute('commands');
    }
}
