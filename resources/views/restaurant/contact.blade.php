@extends('layout')

@section('title', 'Contacter le Restaurant')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">@yield('title')</h1>

            <div class="columns">
                <div class="column is-two-fifths">
                    <form action="{{ route('restaurant.contact', $restaurant) }}" method="POST">
                        @csrf
                        <div class="field">
                            <label class="label">Nom</label>
                            <div class="control">
                                <input class="input" type="text" name="name" placeholder="Votre nom" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" type="email" name="email" placeholder="Votre adresse email" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Objet</label>
                            <div class="control">
                                <input class="input" type="text" name="object" placeholder="Objet de votre message" required>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea class="textarea" name="message" placeholder="Votre message" required></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-primary">
                                    <span>Envoyer</span>
                                    <span class="icon">
                                        <i class="fas fa-paper-plane"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="column">
                    <div class="box">
                        <h3 class="title is-3">{{ $restaurant->name }}</h3>
                        <p class="subtitle is-5">{{ $restaurant->speciality->name }}</p>
                        <p><i class="fas fa-star is-size-5 has-text-success"></i>&nbsp;<strong>{{ $restaurant->note() }}/5</strong></p>
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
                        <a href="{{ route('restaurant.rating.create', $restaurant) }}" class="button is-warning">Donner votre avis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
