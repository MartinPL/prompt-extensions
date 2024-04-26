<?php

namespace Extensions\Weather;

use Illuminate\Support\Facades\Http;
 
class WeatherCommand extends \Livewire\Component
{
    use \App\Escape;

    public $weather;

    public function load()
    {
        $this->weather = Http::get('https://wttr.in/?format=j1')->json()['current_condition'][0];
    }

    public function render()
    {
        return view('weather.weather');
    }
}
