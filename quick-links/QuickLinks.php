<?php

namespace Extensions\QuickLinks;

use Extensions\QuickLinks\CreateEdit;

class QuickLinks extends \App\Extension
{
    public $title = 'Quick Links';

    public function register()
    {
        $this->command('Create quick link')
            ->livewire(CreateEdit::class);

        $this->command('Edit quick link')
            ->livewire(CreateEdit::class, '{id}')
            ->mode('no-view');

        $this->command('Remove quick link')
            ->livewire(Remove::class, '{id}')
            ->mode('no-view');
            
        $this->meta('items')->get()->each(fn($quickLink, $id) =>
            $this->command($quickLink['title'])
                ->type('Quick link')
                ->actions('actions', ['id' => $id])
                ->afterSearch('search', ['quickLink' => $quickLink])
                ->options('item-options', ['id' => $id])
        );
    }
}