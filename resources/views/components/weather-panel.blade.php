<div>
    <section>
        <h1>
            {{ ($location["name"].", ".$location["region"]) }}
        </h1>
    </section>
    <section>
        <h2>
            {{ (round($current["temp_f"])) }}
        </h2>
    </section>
    <section>
        @forelse($forecast["forecastday"] as $forecastDay)
        <p>
            {{ ($forecastDay->date) }}
        </p>
        @empty
        @endforelse
    </section>
</div>