@extends('layout')

@section('title', 'Inscription')

@section('content')
    <section class="section hero is-dark is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="column is-4 is-offset-8 card">
                    <div class="card-content">
                        <div class="mb-5">
                            <h1 class="title has-text-primary">DailyFoods</h1>
                            <p class="subtitle has-text-grey">Créez votre compte dès maintenant</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="notification is-info">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom -->
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input id="name" class="input" type="text" name="name"
                                        value="{{ old('name') }}" placeholder="Nom" required autofocus autocomplete="name" />
                                    <span class="icon is-small is-left"><i class="fas fa-user"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('name')" class="help is-danger" />
                            </div>

                            <!-- Adresse Email -->
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input id="email" class="input" type="email" name="email"
                                        value="{{ old('email') }}" placeholder="Adresse email" required
                                        autocomplete="username" />
                                    <span class="icon is-small is-left"><i class="fas fa-envelope"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="help is-danger" />
                            </div>

                            <!-- Mot de passe -->
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input id="password" class="input" type="password" name="password"
                                        placeholder="Mot de passe" required autocomplete="new-password" />
                                    <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="help is-danger" />
                            </div>

                            <!-- Confirmer le mot de passe -->
                            <div class="field mb-5">
                                <div class="control has-icons-left">
                                    <input id="password_confirmation" class="input" type="password"
                                        name="password_confirmation" placeholder="Confirmer le mot de passe" required
                                        autocomplete="new-password" />
                                    <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="help is-danger" />
                            </div>

                            <div class="field">
                                <button type="submit"
                                    class="button is-primary is-fullwidth">S'inscrire</button>
                            </div>

                            <div class="field mt-5">
                                @if (Route::has('login'))
                                    <p class="content">Déjà inscrit ? <a
                                            href="{{ route('login') }}" class="has-text-info">Connectez-vous
                                            maintenant ?</a>
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
