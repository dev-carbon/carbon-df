@extends('admin.layout')

@section('title', $speciality->exists ? 'Modifier' : 'Ajouter')

@section('content')
    <div>
        <h1>@yield('title')
    </div>

    <form
        enctype="multipart/form-data"
        action="{{ route($speciality->exists ? 'admin.speciality.update' : 'admin.speciality.store', ['speciality' => $speciality]) }}"
        method="POST">
        @csrf
        @method($speciality->exists ? 'PUT' : 'POST')

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Nom',
            'name' => 'name',
            'value' => $speciality->name,
        ])

        @include('components.textarea', [
            'class' => 'mb-3',
            'label' => 'Description',
            'name' => 'description',
            'value' => $speciality->description,
        ])

        @include('components.input', [
            'class' => 'mb-3',
            'label' => 'Images',
            'type' => 'file',
            'name' => 'image',
        ])

        <button type="submit" class="btn btn-primary">
            {{ $speciality->exists ? 'Modifier' : 'Ajouter' }}
        </button>
    </form>
@endsection
