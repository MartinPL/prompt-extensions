<?php

namespace Extensions\QuickLinks;

use Native\Laravel\Facades\Shell;

class Search extends \Livewire\Component
{
    public $parameters = [];

    public $inputs = [];

    public $quickLink;

    public function mount($quickLink)
    {
        $this->quickLink = $quickLink;
        $this->parameters = str($quickLink['url'])->matchAll('/\{(.*?)\}/');
        $this->parameters->transform(function($parameter, $index) {
            $parameter = str($parameter);
            if ($parameter->contains(':')) {
                $this->inputs[$index] = $parameter->after(':');
            }
            return $parameter->before(':')->value;
        });
    }

    public function submit()
    {
        $string = str($this->quickLink['url']);
        $parameters = str($this->quickLink['url'])->matchAll('/\{(.*?)\}/');
        foreach($parameters as $index => $parameter) {
            $string = $string->replace('{'.$parameter.'}', $this->inputs[$index] ?? '');
        }
        $this->js('window.location.href = "#search"');
        Shell::openExternal($string);
    }

    public function render()
    {
        return view('quick-links.search');
    }
}