@extends('layout')

@section('title', 'À propos de nous')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">À propos de Daily<strong class="has-text-info">Foods</strong></h1>

            <div class="content">
                <p>
                    Bienvenue sur notre site DailyFoods! Nous sommes passionnés par la gastronomie et avons créé cet espace
                    pour partager nos découvertes culinaires avec vous.
                </p>
                <p>
                    Notre mission est de vous offrir une expérience unique en explorant les saveurs du monde à travers une
                    sélection de restaurants et de plats exceptionnels.
                </p>
                <p>
                    Chez DailyFoods, nous croyons en la diversité culinaire et nous nous efforçons de vous présenter une
                    palette riche de choix pour satisfaire tous les goûts.
                </p>
                <p>
                    Merci de faire partie de notre aventure gastronomique. Bon appétit!
                </p>
            </div>

            <div class="columns">
                <div class="column is-half">
                    <figure class="image">
                        <img src="https://via.placeholder.com/800x600" alt="Restaurant Image">
                    </figure>
                </div>
                <div class="column is-one-third">
                    <div class="box">
                        <p class="is-size-5 content has-text-primary">
                            Découvrez l'atmosphère chaleureuse de notre restaurant. Nous mettons l'accent sur des
                            ingrédients de qualité et des saveurs authentiques pour vous offrir une expérience culinaire
                            inoubliable.
                        </p>
                        <a href="{{ route('restaurant.list') }}" class="button is-link">
                            <span class="icon">
                                <i class="fas fa-utensils"></i>
                            </span>
                            <span>Voir nos restaurants</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
