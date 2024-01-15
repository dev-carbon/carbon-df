@extends('admin.layout')

@section('title', $restaurant->exists ? 'Modifier un restaurant' : 'Ajouter un restaurant')

@section('content')

    <div>
        <h1>@yield('title')
    </div>

    <form
        enctype="multipart/form-data"
        action="{{ route($restaurant->exists ? 'admin.restaurant.update' : 'admin.restaurant.store', ['restaurant' => $restaurant]) }}"
        method="POST">
        @csrf
        @method($restaurant->exists ? 'PUT' : 'POST')

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Nom',
            'name' => 'name',
            'value' => $restaurant->name,
        ])

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Spécialité',
            'name' => 'speciality',
            'value' => $restaurant->speciality,
        ])

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Tel.',
            'name' => 'phone',
            'value' => $restaurant->phone,
        ])

        <div class="row">
            <div class="col">
                @include('components.input', [
                    'class' => 'mb-3',
                    'label' => 'Adresse',
                    'name' => 'street',
                    'value' => $restaurant->street,
                ])
            </div>
            <div class="col">
                @include('components.input', [
                    'class' => 'mb-3',
                    'label' => 'Code postal',
                    'name' => 'postal_code',
                    'value' => $restaurant->postal_code,
                ])
            </div>
            <div class="col">
                @include('components.input', [
                    'class' => 'mb-3',
                    'label' => 'Ville',
                    'name' => 'city',
                    'value' => $restaurant->city,
                ])
            </div>
        </div>

        @include('components.textarea', [
            'class' => 'mb-3',
            'label' => 'Description',
            'name' => 'description',
            'value' => $restaurant->description,
        ])

        @include('components.input', [
            'type' => 'file',
            'class' => 'mb-3',
            'label' => 'Images',
            'name' => 'images[]',
            'multiple' => true,
        ])

        <button type="submit" class="btn btn-primary">
            {{ $restaurant->exists ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>
@endsection
