@extends('admin.layout')

@section('title', 'Les restaurants')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.restaurant.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Ajouter
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Propriétaire</th>
                <th>Spécialité</th>
                <th>Tel.</th>
                <th>à l'affiche</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>
                        @if ($restaurant->images->count())
                        <img src="{{ asset($restaurant->images[0]->image_path) }}" class="rounded-circle"  width="42" height="42" alt="{{ $restaurant->name }}">
                        @endif
                    </td>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->owner->name }}</td>
                    <td>{{ $restaurant->speciality->name }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ $restaurant->trending ? 'Oui' : 'Non' }}</td>
                    <td>
                        <div class="d-flex justify-content-end column-gap-1">
                            <a href="{{ route('admin.restaurant.show', ['restaurant' => $restaurant]) }}" class="btn btn-warning">Gérer</a>
                            <a href="{{ route('admin.restaurant.edit', ['restaurant' => $restaurant]) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('admin.restaurant.destroy', $restaurant) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $restaurants->links() }}
@endsection
