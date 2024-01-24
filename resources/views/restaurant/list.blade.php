@extends('layout')

@section('title', 'Nos Restaurants')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title is-2 has-text-primary">{{ isset($title) ? $title : 'Nos restaurants' }}</h1>
            <div class="columns is-multiline">
                @foreach ($restaurants as $restaurant)
                <div class="column is-3">
                    @include('components.restaurant-card')                    
                </div>
                @endforeach
            </div>

            <nav class="pagination is-centered is-right" role="navigation" aria-label="pagination">
                {{ $restaurants->links('vendor.pagination.bulma') }}
            </nav>
        </div>
    </section>
@endsection