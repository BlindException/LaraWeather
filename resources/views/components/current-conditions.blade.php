<div>
    <section aria-label ="{{ ($location["name"]) }}">
        <header id="{{($location["name"]."header")}}">
            <h1></h1>
            {{ ($location["name"].", ".$location["region"])}}
        </h1>
        <h2>
            {{ ($location["country"])}}
        </h2>
        </header>
        <div>
            <p>
                @php
                $time = new datetime($current["last_updated"]);
                $time = date_format($time, 'D M, d g:i a');
                @endphp
                {{ ($time) }}
            </p>
            <p>
                {{ ("Current Temp: ".round($current["temp_f"])."°F") }}
            </p>
            <p>
{{ ($current["condition"]->text) }}
<img src="{{ ($current["condition"]->icon)}}" alt = "{{($current["condition"]->text." icon")}}">
                                    </p>
                            
        </div>
    </section>
</div>