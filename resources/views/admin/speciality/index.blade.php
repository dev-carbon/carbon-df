@extends('admin.layout')

@section('title', 'Les spécialités')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.speciality.create') }}" class="btn btn-primary">Ajouter</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>image</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specialities as $speciality)
                <tr>
                    <td>{{ $speciality->name }}</td>
                    <td>{{ $speciality->description }}</td>
                    <td><img src="{{ asset($speciality->image_path) }}"  width="42" height="auto" alt="{{ $speciality->name }}"></td>
                    <td>
                        <div class="d-flex justify-content-end column-gap-1">
                            <a href="{{ route('admin.speciality.edit', $speciality)}}" class="btn btn-secondary">Modifier</a>
                            <form method="POST" action="{{ route('admin.speciality.destroy', $speciality)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr></tr>
        </tbody>
    </table>
@endsection
