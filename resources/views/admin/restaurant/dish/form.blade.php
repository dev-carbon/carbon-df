@extends('admin.restaurant.layout')

@section('title', $dish->exists ? 'Modifier un plat' : 'Ajouter un plat')

@section('content')
    <div>
        <h1>@yield('title')
    </div>

    <form
        enctype="multipart/form-data"
        action="{{ route($dish->exists ? 'admin.restaurant.dish.update' : 'admin.restaurant.dish.store', ['restaurant' => $restaurant, 'dish' => $dish]) }}"
        method="POST">
        @csrf
        @method($dish->exists ? 'PUT' : 'POST')

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Nom',
            'name' => 'name',
            'value' => $dish->name,
        ])

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Prix',
            'name' => 'price',
            'value' => $dish->price,
        ])

        @include('components.textarea', [
            'class' => 'mb-3',
            'label' => 'Description',
            'name' => 'description',
            'value' => $dish->description,
        ])

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Images',
            'type' => 'file',
            'name' => 'images[]',
        ])

        <button type="submit" class="btn btn-primary">
            {{ $dish->exists ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>
@endsection
