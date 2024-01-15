@extends('admin.restaurant.layout')

@section('title', 'Gestion du restautant')

@section('content')
    <div class="d-flex align-items-center">
        <h1>@yield('title')</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <h3>Plats</h3>
        <a href="{{ route('admin.restaurant.dish.create', ['restaurant' => $restaurant]) }}" class="btn btn-primary">Ajouter un plat</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>prix</th>
                <th>description</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($restaurant->dishes as $dish)
                <tr>
                    <td><a href="{{ route('restaurant.dish.show', ['restaurant' => $restaurant, 'dish' => $dish, 'slug' => $dish->slug])}}">{{ $dish->name }}</a></td>
                    <td>{{ $dish->price }}</td>
                    <td>{{ $dish->description }}</td>
                    <td>
                        <div class="d-flex justify-content-end column-gap-1">
                            <a href="{{ route('admin.restaurant.dish.edit', ['dish' => $dish, 'restaurant' => $restaurant]) }}" class="btn btn-secondary">Modifier</a>
                            <form action="{{ route('admin.restaurant.dish.destroy', ['dish' => $dish, 'restaurant' => $restaurant]) }}" method="POST">
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

    {{-- {{ $dishes->links() }} --}}

@endsection
