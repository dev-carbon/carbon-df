@extends('admin.layout')

@section('title', $role->exists ? 'Modifier un role' : 'Ajouter un role')

@section('content')
    <div class="p-4 mb-4 bg-light shadow-sm">
        <h3>@yield('title')</h3>
    </div>

    <div class="col-md-4">
        <div class="p-4 bg-light">
            @include('admin.role.form')
        </div>
    </div>
@endsection
