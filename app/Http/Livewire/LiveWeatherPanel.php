<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LiveWeatherPanel extends Component
{
    private $key = '0a56523d6e454be8995200529210501';
    public $location;
    public $current;
    public $forecast;
    public function render()
    {
        $location = file_get_contents("https://api.weatherapi.com/v1/search.json?key=" . $this->key . "&q=auto:ip&aqi=no");
        $response = file_get_contents("https://api.weatherapi.com/v1/current.json?key=" . $this->key . "&q=auto:ip&aqi=no");
            $response1 = file_get_contents("https://api.weatherapi.com/v1/forecast.json?key=" . $this->key. "&q=auto:ip&days=5&aqi=no");
            $response = json_decode($response, false);
            $location = json_decode($location, false);
            foreach($location as $location)
if($response->location->name==$location->name)            
{
    $this->location = collect($location);
}
            $response1 = json_decode($response1, false);
            
                        $this->current = collect($response->current);
            $this->forecast = collect($response1->forecast);
        return view('livewire.live-weather-panel', [
'location' => $this->location,
'current' => $this->current,
'forecast' => $this->forecast,
        ]);
    }
}
