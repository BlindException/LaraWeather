<div>
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    <section aria-label = "{{ ("Location") }}">
        <header>
        <h1>
            {{ ($location["name"].", ".$location["region"]) }}
        </h1>
        <h2>
            {{ ($location["country"]) }}
        </h2>
    </header>
        <div>
            <p>Latitude:</p><p>{{ ($location["lat"])}}</p>
            <p>Longitude:</p><p>{{ ($location["lon"])}}</p>
        </div>
    </section>
    <section aria-label = "{{ ("Current Conditions") }}">
        <header>
                <h1>
            {{ (round($current["temp_f"])."°F ".$current["condition"]->text) }}
        </h1>
        <img href = "{{ ($current["condition"]->icon) }}" alt = "{{ ($current["condition"]->text) }}">
    </header>
    <div>
        <p>Wind:</p><p>{{ (round($current["wind_mph"])." mph ".$current["wind_dir"]) }}</p>
    </div>
    </section>
    <section aria-label = "{{ ("5 Day Forecast") }}">
        @forelse($forecast["forecastday"] as $forecastDay)
        @php
            $datetime = new Datetime($forecastDay->date);
            $day = date_format($datetime, 'D M d');
        @endphp
        <div>
        <header>
            <h5>
            {{ ($day) }}
        </h5>
                </header>
        <p>{{ (round($forecastDay->day->maxtemp_f)."°F /".round($forecastDay->day->mintemp_f)."°F") }}</p>
        <p>{{ ($forecastDay->day->condition->text) }}</p><img href = "{{ ($forecastDay->day->condition->icon)}}" alt = "{{ ($forecastDay->day->condition->text)}}">
        
        <p>{{ ($forecastDay->day->daily_chance_of_rain."% rain/".$forecastDay->day->daily_chance_of_snow."% snow") }}</p>

    </div>
        @empty
            @endforelse
    </section>
</div>