<div class="card restaurant-card is-flex">
    <a href="{{ route('restaurant.show', $restaurant) }}"></a>
    <div class="card-image">
        {{-- <figure class="image is-4by3"> --}}
            @if ($restaurant->images->count())
                <img src="{{ asset($restaurant->images[0]->image_path) }}" alt="Restaurant Image"
                    class="image restaurant-image">
            @else
                <img src="https://via.placeholder.com/800x600" alt="Restaurant Image" class="image restaurant-image">
            @endif
        {{-- </figure> --}}
    </div>
    <div class="card-content">
        <div class="content">
            <h3 class="title is-5 has-text-info">{{ Str::limit($restaurant->name, 21) }}</h3>
            <h4 class="subtitle is-6 restaurant-specialty">Spécialité: Cuisine française</h4>
            <p class="restaurant-description">{{ Str::limit($restaurant->description, 42) }}</p>
            <p class="restaurant-location">
                <i class="fas fa-map-marker has-text-info"></i> {{ $restaurant->address() }}
            </p>
        </div>
    </div>
</div>
