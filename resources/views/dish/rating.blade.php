@extends('layout')

@section('scripts')
    <script src="{{ asset('libs/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/js/rater.min.js') }}"></script>
@endsection

@section('title', 'Donner votre avis')

@section('content')
    <section class="section">
        <div class="columns">
            <div class="column is-one-third">
                <img src="{{ asset($dish->images[0]->image_path) }}" class="img-fluid" width="542px;" alt="{{ $dish->name }}">
            </div>
            <div class="column">
                <h3 class="title is-3">{{ $dish->name }}</h3>
                <p class="subtitle">Donner votre avis</p>
                <form action="{{ route('restaurant.dish.rating.store', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug]) }}" method="POST">
                    @csrf
                    <div class="field">
                        <div class="control">
                            @include('components.rating', [
                                'name' => 'note',
                                'label' => 'Votre note',
                                'hidden' => true,
                            ])
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Votre commentaire</label>
                        <div class="control">
                            <textarea name="comment" class="textarea" required></textarea>
                        </div>
                    </div>

                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
