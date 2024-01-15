@extends('admin.layout')

@section('title', 'Les restaurants')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.restaurant.create') }}" class="btn btn-primary">Ajouter un restaurant</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Spécialité</th>
                <th>Tel.</th>
                <th>Address</th>
                <th>Description</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->speciality }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ $restaurant->address() }}</td>
                    <td>{{ $restaurant->description }}</td>
                    <td>
                        <div class="d-flex justify-content-end column-gap-1">
                            <a href="{{ route('admin.restaurant.show', ['restaurant' => $restaurant]) }}" class="btn btn-secondary">Gérer</a>
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
