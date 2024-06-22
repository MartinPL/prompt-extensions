<?php

namespace Extensions\QuickLinks;

class QuickLinks extends \App\Extension
{
    public $title = 'Quick Links';

    public function register()
    {
        $this->command('Create quick link')
            ->invoke(CreateEdit::class);

        $this->command('Edit quick link')
            ->mode('no-view')
            ->parameters('{id}')
            ->invoke(CreateEdit::class);

        $this->command('Remove quick link')
            ->mode('no-view')
            ->parameters('{id}')
            ->invoke(Remove::class);

        $this->meta('items')->get()->each(fn ($quickLink, $id) => $this->command($quickLink['title'])
            ->type('Quick link')
            ->addStack('afterSearch', 'search', ['quickLink' => $quickLink, 'id' => $id])
            ->addStack('actionPanel', 'action-panel', ['id' => $id], false)
            ->options('item-options', ['id' => $id])
        );
    }
}
