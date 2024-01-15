@extends('layout')

@section('title', 'Détails Restaurant')

@section('content')
        <h1>@yield('title')</h1>

        <div class="row">
            <div class="col-md-7">
                <img src="{{ asset($restaurant->images[0]->image_path) }}" class="img-fluid" alt="">
            </div>

            <div class="col-md-5 bg-light rounded">
                <h3>{{ $restaurant->name }}</h3>
                <p>{{ $restaurant->speciality }}</p>
                <p>{{ $restaurant->phone }}</p>
                <p>{{ $restaurant->address() }}</p>
                <p class="text-muted">{{ $restaurant->description }}</p>
                <p><i class="fas fa-star text-warning"></i>{{ $restaurant->note() }}/5</p>
                <a href="{{ route('restaurant.contact', $restaurant) }}">contacter</a>
                <a href="{{ route('restaurant.rating.create', $restaurant) }}">Donner votre avis</a>
            </div>
        </div>

        <section>
            <h3 class="my-5">Découvrir les plats</h3>
            <div class="row">
                @foreach ($restaurant->dishes as $dish)
                    <div class="col-md-4">
                        @include('components.dish-card')
                    </div>
                @endforeach
            </div>
        </section>

        <section>
            <h3>Les avis</h3>
            <div class="row">
                @foreach ($restaurant->ratings as $rating)
                    <div class="col-md-12">
                        <div class="border rounded p-4 shadow mb-4">
                            @include('components.rating-card')
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endsection
