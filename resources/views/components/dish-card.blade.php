<div class="card">
    <img src="{{ asset($dish->images[0]->image_path)}}" class="card-img-top" alt="">
    <div class="card-body">
        <a href="{{ route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug()]) }}" class="">{{ $dish->name }}</a>
        <p class="card-text">{{ $dish->description }}</p>
    </div>
</div>
