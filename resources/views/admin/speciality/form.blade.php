@extends('admin.layout')

@section('title', $speciality->exists ? 'Modifier une spécialité' : 'Ajouter une spécialité')

@section('content')
    <div class="p-4 mb-4 bg-light rounded-4 shadow">
        <h3>@yield('title')</h3>
    </div>

    <div class="col-md-4">
        <div class="p-4 bg-light  rounded-4">
            <form enctype="multipart/form-data"
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
                
                <a href="{{ route('admin.speciality.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    {{ $speciality->exists ? 'Modifier' : 'Ajouter' }}
                </button>
            </form>
        </div>
    </div>
@endsection
