@extends('layout')

@section('title', 'Détails Restaurant')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-7">
                    @if ($restaurant->images->count())
                        <img src="{{ asset($restaurant->images[0]->image_path) }}" alt="Restaurant Image"
                            class="image restaurant-image">
                    @else
                        <img src="https://via.placeholder.com/800x600" alt="Restaurant Image" class="image restaurant-image">
                    @endif
                </div>

                <div class="column is-5">
                    <div class="box">
                        <h3 class="title is-3">{{ $restaurant->name }}</h3>
                        <p class="subtitle is-5">{{ $restaurant->speciality->name }}</p>
                        <p>
                            <span class="icon">
                                <i class="fas fa-phone"></i>
                            </span>
                            {{ $restaurant->phone }}
                        </p>
                        <p class="content">
                            <span class="icon">
                                <i class="fas fa-map-marker"></i>
                            </span>
                            {{ $restaurant->address() }}
                        </p>
                        <p class="content">{{ $restaurant->description }}</p>
                        <p><i class="fas fa-star is-size-5 has-text-success"></i>&nbsp;<strong>{{ $restaurant->note() }}/5</strong></p>
                        <a href="{{ route('restaurant.contact', $restaurant) }}" class="button is-info">Contacter</a>
                        <a href="{{ route('restaurant.rating.create', $restaurant) }}" class="button is-warning">Donner
                            votre avis</a>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3 class="title is-3 mb-5">Découvrir les plats</h3>
                <div class="columns is-multiline">
                    @foreach ($restaurant->dishes as $dish)
                        <div class="column is-4">
                            @include('components.dish-card')
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="section">
                <h3 class="title is-3">Les avis</h3>
                <div class="columns is-multiline">
                    @foreach ($restaurant->ratings as $rating)
                        <div class="column is-two-thirds">
                            @include('components.rating-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
