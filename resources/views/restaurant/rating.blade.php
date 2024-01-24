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
                @if ($restaurant->images->count())
                    <img src="{{ asset($restaurant->images[0]->image_path) }}" alt="Restaurant Image" class="restaurant-image">
                @else
                    <img src="https://via.placeholder.com/800x600" alt="Restaurant Image" class="restaurant-image">
                @endif
            </div>
            <div class="column">
                <h3 class="title is-3">{{ $restaurant->name }}</h3>
                <p class="subtitle">{{ $restaurant->speciality->name }}</p>
                <p><i class="fas fa-star is-size-5 has-text-success"></i>&nbsp;<strong>{{ $restaurant->note() }}/5</strong>
                </p>
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

                <div class="columns">
                    <div class="column">
                        <h3 class="title is-3">Donner votre avis</h3>
        
                        <form action="{{ route('restaurant.rating.store', ['restaurant' => $restaurant]) }}" method="POST">
                            @csrf
        
                            <div class="field">
                                <label class="label">Votre note</label>
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
            </div>
        </div>
    </section>
@endsection
