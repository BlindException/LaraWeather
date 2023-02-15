<div>
    <label>Enter zcity name, or Postal Code:
        <input wire:model ="search" type = "search"/>
    </label>
    <button wire:click="searchLocation">Search Location</button>
    <ul>
        @forelse($locations as $location)
        <li><button wire:click = "setLocation('{{ $location["name"]}}', '{{$location["region"]}}', '{{$location["country"]}}', {{$location["lat"]}}, {{$location["lon"]}})">{{ ($location["name"]) }}</button></li>
        @empty
<li>No Search Results, Try Again.</li>
        @endforelse
    </ul>

    <fieldset>
        <legend>
            <h3>
                {{ ("Location Details") }}
            </h3>
        </legend>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('favoritelocations.store') }}">
            @csrf
            
            <input value="{{ (auth()->user()->id) }}" name="user_id" hidden >


            <input name ="query" value = "{{ ($this->search) }}" hidden>
            <label>City:
                <input value = "{{ ($name) }}"aria-readonly="true" readonly name="name">
            </label>
            <label>State>/Province:
                <input value = "{{ ($region) }}"aria-readonly="true" readonly name="region">
            </label>
            <label>Country:
                <input value = "{{($country) }}"aria-readonly="true" readonly name="country">
            </label>
            <label>Latitude:
                <input value = "{{ ($lat) }}"aria-readonly="true" readonly name="lat">
            </label>
            <label>Longitude:
                <input value = "{{ ($lon) }}" aria-readonly="true" readonly name="lon">
            </label>
            <button type="submit">Save Location</button>
        </form>
    </fieldset>
    
</div>
