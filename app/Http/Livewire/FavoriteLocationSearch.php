<?php

namespace App\Http\Livewire;

use Illuminate\Http\Client\HttpClientException;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class FavoriteLocationSearch extends Component
{
    private $key = "0a56523d6e454be8995200529210501";
    public $search = '';
        public $name = '';
        public $region = '';
        public $country = '';
        public $lat = '';
        public $lon = '';
    public $locations = [];
    public function searchLocation()
    {
                if($this->search==''||$this->search==null)
        {
            return;
                    }
        $this->locations = [];
        
                                
                                if(@file_get_contents("https://api.weatherapi.com/v1/current.json?key=".$this->key."&q=".$this->search)=== false)
                                {
                                    return;
                                }else{
                                    $response = file_get_contents("https://api.weatherapi.com/v1/current.json?key=".$this->key."&q=".$this->search);
                                }
                                if(@file_get_contents("https://api.weatherapi.com/v1/search.json?key=".$this->key."&q=".$this->search)===false)
                                    {
                                        return;
                                    }else{
                                        $more = @file_get_contents("https://api.weatherapi.com/v1/search.json?key=".$this->key."&q=".$this->search);
                                    }
                                
                                

        
            
                                $response = json_decode($response, false);                        
                                                        $array = [
                            'name'=> $response->location->name,
                            'region' => $response->location->region,
                            'country' => $response->location->country,
                                                        'lat' => $response->location->lat,
                                                        'lon' => $response->location->lon,
                                                        ];
array_push($this->locations, $array);

                                                                                                                                                
                        $more = json_decode($more, false);
foreach($more as $response)
{
    $array = [
        'name'=> $response->name,
        'region' => $response->region,
        'country' => $response->country,
                                    'lat' => $response->lat,
                                    'lon' => $response->lon,
    ];
if($this->locations[0]["name"]!=$array["name"])
{
    array_push($this->locations, $array);
}    
    }
sort($this->locations);

    }    
    public function setLocation($name, $region, $country, $lat, $lon)
    {
        $this->name = $name;
        $this->region = $region;
        $this->country = $country;
        $this->lat = $lat;
        $this->lon = $lon;
                                    }
    public function render()
    {
                        return view('livewire.favorite-location-search', [
            'locations' => $this->locations,
                    ]);
    }
}
