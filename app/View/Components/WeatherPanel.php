<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class WeatherPanel extends Component
{
    private $key = '0a56523d6e454be8995200529210501';
    public $location;
    public $current;
    public $forecast;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
                /*$q = $request->query('q');
if($q==null||$q==null)
{
            $q = 'Nowhere';
}        */
            $response = file_get_contents("https://api.weatherapi.com/v1/current.json?key=" . $this->key . "&q=auto:ip&aqi=no");
            $response1 = file_get_contents("https://api.weatherapi.com/v1/forecast.json?key=" . $this->key. "&q=auto:ip&days=5&aqi=no");
            $response = json_decode($response, false);
            $response1 = json_decode($response1, false);
            $this->location = collect($response->location);
            $this->current = collect($response->current);
            $this->forecast = collect($response1->forecast);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather-panel');
    }
}
