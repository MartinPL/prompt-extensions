<?php

namespace Extensions\Weather;

class Weather extends \App\Extension
{
    public $title = 'Weather';

    public function register()
    {
        $this->command('Weather')
            ->invoke(WeatherCommand::class);
    }
}
