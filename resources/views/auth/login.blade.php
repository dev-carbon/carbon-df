@extends('layout')

@section('title', 'Connexion')

@section('content')
    <section class="section hero is-dark is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="column is-4 is-offset-8 card">
                    <div class="card-content">
                        <div class="mb-5">
                            <h1 class="title has-text-primary">DailyFoods</h1>
                            <p class="subtitle has-text-grey">Connectez-vous à votre compte</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="notification is-info">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

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
                            <div class="field mb-5">
                                <div class="control has-icons-left">
                                    <input id="password" class="input" type="password" name="password"
                                        placeholder="Mot de passe" required autocomplete="new-password" />
                                    <span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="help is-danger" />
                            </div>

                            <!-- Remember Me -->
                            <div class="field">
                                <label class="checkbox">
                                    <input id="remember_me" type="checkbox" name="remember">
                                    Se souvenir de moi
                                </label>
                            </div>

                            <div class="field">
                                @if (Route::has('password.request'))
                                    <p class="has-text-muted"><a href="{{ route('password.request') }}">Mot de passe oublié
                                            ?</a>
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <button type="submit" class="button is-primary is-fullwidth">Se connecter</button>
                            </div>


                            <div class="field mt-5">
                                @if (Route::has('register'))
                                    <p class="content">Pas encore de compte ? <a
                                            href="{{ route('register') }}" class="has-text-info">Insrivez-vous
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
