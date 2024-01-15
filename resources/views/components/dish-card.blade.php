<div class="card">
    <img src="https://placehold.co/600x400" class="card-img-top" alt="">
    <div class="card-body">
        <a href="{{ route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug()]) }}" class="">{{ $dish->name }}</a>
        <p class="card-text">{{ $dish->description }}</p>
    </div>
</div>
