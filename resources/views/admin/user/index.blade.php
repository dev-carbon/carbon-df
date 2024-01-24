@extends('admin.layout')

@section('title', 'Les utilisateurs')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Ajouter
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Email</th>
                <th>Tel.</th>
                <th>Address</th>
                <th>role</th>
                <th class="text-end"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <img src="{{ asset($user->profile->avatar) }}" class="rounded-circle" width="21" height="21"
                            alt="{{ $user->name }}">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    {{-- <td>{{ $user->address() }}</td> --}}
                    <td></td>
                    <td>
                        {{ $user->getRoleNames() }}</td>
                    <td>
                        <div class="d-flex justify-content-end column-gap-1">
                            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-secondary">Editer</a>
                            <form action="{{ route('admin.user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning">Bannir</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
