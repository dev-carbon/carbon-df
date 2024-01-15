@extends('layout')

@section('scripts')
    <script src="{{ asset('libs/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/js/rater.min.js') }}"></script>
@endsection

@section('title', 'Donner votre avis')

@section('content')
    <div div class="d-flex">
        <img src="{{ asset($dish->images[0]->image_path) }}" class="img-fluid" width="542px;" alt="{{ $dish->name }}">
        <h3>{{ $dish->name }}</h3>
    </div>
    <h3>Donner votre avis</h3>
    <form
        action="{{ route('restaurant.dish.rating.store', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug]) }}" method="POST">
        @csrf
        @include('components.rating', ['name' => 'rating', 'label' => 'Votre note', 'hidden' => true])
        @include('components.textarea', ['name' => 'comment', 'label' => 'Votre commentaire'])
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
