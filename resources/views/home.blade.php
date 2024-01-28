@extends('layout')

@section('title', 'Accueil')

@section('content')
    {{-- Hero --}}
    <section class="hero is-dark is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Bienvenu sur DailyFoods
                </h1>
                <h2 class="subtitle">
                    Découvrez les meilleurs restaurants et services de votre région.
                </h2>

                {{-- Barre de recherche --}}
                <div class="p-4">
                    <form>
                        <div class="field is-grouped is-grouped-centered mb-5">
                            <p class="control has-icons-left">
                                <input class="input is-rounded" type="text"
                                    placeholder="Rechercher un restaurant, un plat, etc.">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-search"></i>
                                </span>
                            </p>
                            <p class="control has-icons-left">
                                <input class="input is-rounded" type="text" placeholder="Localisation">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-map-marker"></i>
                                </span>
                            </p>
                        </div>
                        <button type="submit" class="button is-light">
                            Rechercher
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Trending Restaurants -->
    <section id="trending" class="section trending">
        <div class="container">
            <div class="is-fullwidth columns is-vcentered">
                <div class="column">
                    <h2 class="title is-2 has-text-info">Restaurants à l'affiche</h2>
                </div>
                <div class="column is-narrow">
                    <a href="{{ route('restaurant.trending') }}"
                        class="button is-light has-text-info has-text-weight-bold">Voir tout</a>
                </div>
            </div>
            <div class="columns is-multiline">
                @foreach ($trendingRestaurants as $restaurant)
                    <div class="column is-flex">
                        @include('components.restaurant-card')
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="best-choices" class="section">
        <div class="container">
            <div class="is-fullwidth columns is-vcentered">
                <div class="column">
                    <h2 class="title is-2 has-text-info">Nos restaurants</h2>
                </div>
                <div class="column is-narrow">
                    <a href="{{ route('restaurant.list') }}" class="button is-light has-text-info has-text-weight-bold">Voir
                        tout</a>
                </div>
            </div>


            <div class="columns is-multiline">
                @foreach ($latestRestaurants as $restaurant)
                    <div class="column is-flex">
                        @include('components.restaurant-card')
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Nos Services -->
    <section id="services" class="section">
        <div class="container">
            <h2 class="title is-2 has-text-centered mb-5">Nos services</h2>

            <div class="columns">
                <!-- Service 1 -->
                <div class="column">
                    <div class="box">
                        <h3 class="title has-text-centered is-4">Service 1</h3>
                        <p class="p-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="column">
                    <div class="box">
                        <h3 class="title has-text-centered is-4">Service 2</h3>
                        <p class="p-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="column">
                    <div class="box">
                        <h3 class="title has-text-centered is-4">Service 3</h3>
                        <p class="p-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section Nous Contacter -->
    <section id="contact" class="section">
        <div class="container">
            <h2 class="title is-3">Ce que pense les <strong>Eater</strong></h2>
            <!-- Ajoutez ici du contenu pour la section nous contacter -->
        </div>
    </section>
@endsection
