<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CurrentConditions extends Component
{
    private $url = "https://api.weatherapi.com/v1/current.json?key=0a56523d6e454be8995200529210508&q=";
    public $query = "";

    public $location;
    public $current;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($query = null)
    {
        $this->query = $query;

        if ($this->query == null || $this->query == '') {
            $this->query = "auto:ip";
        }
        $q = $this->query;
        $response = file_get_contents($this->url . $q);
        $response = json_decode($response, false);
        $this->location = collect($response->location);
        $this->current = collect($response->current);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.current-conditions');
    }
}