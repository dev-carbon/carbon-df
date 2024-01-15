@extends('layout')

@section('title', 'Connexion')

@section('content')

    <div class="row justify-content-center p-5 col-md-5 ms-auto">
        <h3 class="mb-3 text-start">@yield('title')</h3>

        <p class="text-muted text-start">
            Pas encore inscrit? <a href="#">Inscrivez-vous</a>
        </p>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            @include('components.input', [
                'name' => 'email',
                'label' => 'Email',
                'type' => 'email',
            ])

            @include('components.input', [
                'name' => 'password',
                'label' => 'Mot de passe',
                'type' => 'password',
            ])

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>

        <div class="col mt-4 text-end">
            <a href="#">Mot de passe oublié?</a>
        </div>
        
    </div>
@endsection
