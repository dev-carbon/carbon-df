<div class="card">
    <img src="{{ asset($restaurant->images[0]->image_path)}}" class="card-img-top" alt="">
    <div class="card-body">
        <a href="{{ route('restaurant.show', $restaurant) }}" class="">{{ $restaurant->name }}</a>
        <p class="card-text">{{ $restaurant->speciality }}</p>
    </div>
</div>
