@extends('layout')

@section('title', 'Contact Restaurant')

@section('content')
        <h1>@yield('title')</h1>

        <div class="row">
            <div class="col-md-7">
                <form action="{{ route('restaurant.contact', $restaurant) }}" method="POST">
                    @csrf
                    @include('components.input', ['label' => 'Nom', 'name' => 'name'])
                    @include('components.input', ['label' => 'Email', 'name' => 'email'])
                    @include('components.input', ['label' => 'Objet', 'name' => 'object'])
                    @include('components.textarea', ['label' => 'Message', 'name' => 'message'])
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>

            <div class="col-md-5 bg-light rounded">
                <h3>{{ $restaurant->name }}</h3>
                <p>{{ $restaurant->speciality }}</p>
                <p>{{ $restaurant->phone }}</p>
                <p>{{ $restaurant->address() }}</p>
                <p class="text-muted">{{ $restaurant->description }}</p>
                <img src="{{ asset($restaurant->images[0]->image_path) }}" width="200px" height="auto" class="img-fluid" alt="">
                <p><i class="fas fa-star text-warning"></i>{{ $restaurant->note() }}/5</p>
                <a href="{{ route('restaurant.contact', $restaurant) }}">contacter</a>
                <a href="{{ route('restaurant.rating.create', $restaurant) }}">Donner votre avis</a>
            </div>
        </div>
@endsection
