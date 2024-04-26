<?php

namespace Extensions\Emoji;

class Emoji extends \App\Extension
{
    public $title = 'Emoji';

    public function register()
    {
        $this->command('emoji')
            ->livewire('emoji');
    }
}
