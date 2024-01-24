@extends('admin.layout')

@section('title', $user->exists ? 'Modifier l\'utilisateur' : 'Ajouter un utilisateur')

@section('content')
    <div class="p-4 mb-4 bg-light rounded-4 shadow">
        <h3>@yield('title')</h3>
    </div>

    <div class="col-md-4">
        <div class="p-4 bg-light  rounded-4">
            @include('admin.user.form')
        </div>
    </div>
@endsection
