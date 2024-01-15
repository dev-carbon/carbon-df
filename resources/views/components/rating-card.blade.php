<div class="p-4">
    <h4>{{ $rating->user->email }}</h4>
    <p>{{ $rating->note }}</p>
    <p>{{ $rating->comment }}</p>
    <p>{{ $rating->created_at }}</p>

    <div>
        @if ($rating->user_id == auth()->user()->id)
            @if ($rating instanceof \App\Models\RestaurantRating)
                <form method="post" action="{{ route('restaurant.rating.destroy', ['restaurant' => $restaurant, 'rating' => $rating]) }}">
            @elseif($rating instanceof \App\Models\DishRating)
                <form method="post" action="{{ route('restaurant.dish.rating.destroy', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug, 'rating' => $rating]) }}">
            @endif
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
        @endif
    </div>
</div>
