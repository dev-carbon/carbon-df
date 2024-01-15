@extends('layout')

@section('title', 'Détails Restaurant')

@section('content')
    <div class="p-5">
        <h1>@yield('title')</h1>

        <div class="row">
            <div class="col-md-7">
                <img src="{{ asset($restaurant->images[0]->image_path)}}" class="img-fluid" alt="">
            </div>

            <div class="col-md-5 bg-light rounded">
                <h3>{{ $restaurant->name }}</h3>
                <p>{{ $restaurant->speciality }}</p>
                <p>{{ $restaurant->phone }}</p>
                <p>{{ $restaurant->address() }}</p>
                <p class="text-muted">{{ $restaurant->description }}</p>
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
    @endsection
