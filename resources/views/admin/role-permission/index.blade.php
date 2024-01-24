@extends('admin.layout')

@section('title', 'Role et Permissions')

@section('content')
    <div class="row">
        <div class="col-lg-5">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Role</h3>
                <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Ajouter un role
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Guard name</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>
                                <div class="d-flex justify-content-end column-gap-1">
                                    <a href="{{ route('admin.role.edit', $role) }}"
                                        class="btn btn-secondary">Modifier</a>
                                    <form method="POST" action="{{ route('admin.role.destroy', $role) }}">
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
        </div>

        <div class="col-lg-7">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Permissions</h3>
                <a href="{{ route('admin.permission.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Ajouter une permission
                </a>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Guard name</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td>
                                <div class="d-flex justify-content-end column-gap-1">
                                    <a href="{{ route('admin.permission.edit', $permission) }}"
                                        class="btn btn-secondary">Modifier</a>
                                    <form method="POST" action="{{ route('admin.permission.destroy', $permission) }}">
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
        </div>
    </div>
@endsection
