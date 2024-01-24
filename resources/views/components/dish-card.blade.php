<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
            <img src="{{ asset($dish->images[0]->image_path)}}" alt="Dish Image" class="card-img-top">
        </figure>
    </div>
    <div class="card-content">
        <a href="{{ route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug()]) }}" class="is-size-5 has-text-weight-semibold">{{ $dish->name }}</a>
        <p class="mt-2">{{ \Illuminate\Support\Str::limit($dish->description, 42) }}</p>
        <p class="mt-2">{{ number_format($dish->price, 2, ',', ' ') }} €</p>
        <a href="{{ route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug()]) }}" class="button is-info mt-3">Voir plus</a>
    </div>
</div>
