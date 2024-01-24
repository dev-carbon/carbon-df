@extends('layout')

@section('title', 'Détails plat')

@section('content')
    <section class="section">
        <div class="columns">
            <div class="column is-4">
                <img src="{{ asset($dish->images[0]->image_path) }}" alt="Dish Image">
            </div>

            <div class="column rounded p-4">
                <h2 class="title is-2">{{ $dish->name }}</h2>
                <h4 class="subtitle is-4 has-text-primary">{{ Number::currency($dish->price, in: 'EUR') }}</h4>
                <p class="subtitle is-6 has-text-grey">{{ $dish->description }}</p>

                {{-- Ingredient --}}
                {{-- <div class="mt-5">
                    <h3 class="title is-3">Ingrédients</h3>

                    <table class="table is-striped">
                        <thead>
                            <tr>
                                <th>Ingredient</th>
                                <th>Quantité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tomate</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
                <a href="{{ route('restaurant.dish.rating.create', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug]) }}"
                    class="button is-info">Donner votre avis sur ce plat</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="columns">
            <div class="column is-three-quarters">
                <h2 class="title is-2 my-5">Avis</h2>
                <div class="columns is-multiline">
                    @foreach ($dish->ratings as $rating)
                        <div class="column is-two-thirds">
                            @include('components.rating-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
