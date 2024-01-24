<div class="box p-4">
    <h4 class="title is-4">{{ $rating->user->email }}</h4>
    <p class="subtitle is-6">
        <i class="fas fa-star is-size-5 has-text-success"></i>&nbsp;<strong>{{ $restaurant->note() }}/5</strong>
    </p>
    <p>{{ $rating->comment }}</p>
    <p class="has-text-grey">{{ $rating->created_at }}</p>

    <div class="mt-3">
        @if ($rating->user_id == auth()->user()->id)
            @if ($rating instanceof \App\Models\RestaurantRating)
                <form method="post" action="{{ route('restaurant.rating.destroy', ['restaurant' => $restaurant, 'rating' => $rating]) }}">
            @elseif($rating instanceof \App\Models\DishRating)
                <form method="post" action="{{ route('restaurant.dish.rating.destroy', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug, 'rating' => $rating]) }}">
            @endif
                @csrf
                @method('DELETE')
                <button class="button is-danger is-small">
                    <span class="icon">
                        <i class="fas fa-trash-alt"></i>
                    </span>
                </button>
            </form>
        @endif
    </div>
</div>
