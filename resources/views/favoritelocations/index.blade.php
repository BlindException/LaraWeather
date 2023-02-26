<x-app-layout>
    <h2>
        {{ ("My Saved Locations") }}
    </h2>
    <ul>
        @forelse($favoritelocations as $favoritelocation)
        <li>
            <p>{{ ($favoritelocation->name.", ".$favoritelocation->region) }}</p>
            <p>
            <form method="POST" action="{{ route('favoritelocations.destroy', $favoritelocation) }}">
                @csrf
                @method('delete')
                <a href="{{route('favoritelocations.destroy', $favoritelocation)}}"
                    onclick="event.preventDefault(); this.closest('form').submit();">{{ ("Delete") }}</a>
            </form>
            </p>
        </li>
        @empty
        <li>No Saved Locations</li>
        @endforelse
    </ul>
</x-app-layout>