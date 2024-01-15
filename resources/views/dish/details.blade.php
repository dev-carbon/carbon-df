@extends('layout')

@section('title', 'Détails plat')

@section('content')

    <section>
        <h1 class="my-4">@yield('title')</h1>

        <div class="row">
            <div class="col-md-8">
                <img src="{{ asset($dish->images[0]->image_path) }}" class="img-fluid" alt="">
            </div>

            <div class="col-md-4 bg-light rounded p-4">
                <h3>{{ $dish->name }}</h3>
                <h5 class="text-primary">{{ Number::currency($dish->price, in: 'EUR') }}</h5>
                <p class="text-muted">{{ $dish->description }}</p>

                <div class="mt-5">
                    <h3>Ingrédients</h3>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Ingredient</th>
                                <th scope="col">Quantité</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Tomate</th>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>

                    <a
                        href="{{ route('restaurant.dish.rating.create', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug]) }}">Donner
                        votre avis sur ce plat</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-7">
                <h3 class="my-5">Avis</h3>
                <div class="row">
                    @foreach ($dish->ratings as $rating)
                        <div class="col-12">
                            <div class="border rounded p-4 shadow mb-4">
                            @include('components.rating-card')
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
