@extends('layout')

@section('title', 'Accueil')

@section('content')
    <section class="py-4">
        <h1>Nos restaurants</h1>

        <div class="row">
            @foreach ($restaurants as $restaurant)
                <div class="col-md-3">
                    @include('components.restaurant-card', ['restaurant' => $restaurant])
                </div>
            @endforeach
        </div>

        {{ $restaurants->links() }}
    </section>
@endsection
