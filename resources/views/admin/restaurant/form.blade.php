@extends('admin.layout')

@section('title', $restaurant->exists ? 'Modifier un restaurant' : 'Ajouter un restaurant')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-primary">@yield('title')</h3>
    </div>

    <hr>
    
    <div class="col-md-4">
        <form enctype="multipart/form-data"
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

            <div class="mb-3">
                <label>Propriétaire</label>
                <select name="owner" class="form-select">
                    <option value="">Sélectioner le Propriétaire</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{  old('owner', $restaurant->owner_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('owner')
                    <span class="small text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label>Spécialité</label>
                <select name="speciality" class="form-select">
                    <option value="">Sélectioner la Spécialité</option>
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id }}"
                            {{ old('speciality', $restaurant->speciality_id) == $speciality->id ? 'selected' : '' }}>
                            {{ $speciality->name }}
                        </option>
                    @endforeach
                </select>
                
                @error('speciality')
                    <span class="small text-danger">{{ $message }}</span>
                @enderror
            </div>

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

            <div class="mb-3">
                <label>Images</label>
                <input type="file" name="images[]" class="form-control">
                @error('images')
                    <span class="small text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" name="trending" id="trending"
                    {{ old('trending', $restaurant->trending) ? 'checked' : '' }}>
                    <label class="form-check-label" for="trending">Restaurant à l'affiche</label>
                </div>
                @error('trending')
                    <span class="small text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Enregistrer
            </button>
        </form>
    </div>
@endsection
