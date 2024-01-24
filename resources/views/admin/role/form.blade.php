<form enctype="multipart/form-data"
    action="{{ route($role->exists ? 'admin.role.update' : 'admin.role.store', ['role' => $role]) }}" method="POST">
    @csrf
    @method($role->exists ? 'PUT' : 'POST')

    @include('components.input', [
        'class' => 'mb-3',
        'label' => 'Nom',
        'name' => 'name',
        'value' => $role->name,
    ])

    @include('components.input', [
        'class' => 'mb-3',
        'label' => 'Guard name',
        'name' => 'guard_name',
        'value' => $role->guard_name,
    ])

    <div class="mt-4">
        <a href="{{ route('admin.role.permission') }}" class="btn btn-secondary">
            Annuler
        </a>

        <button type="submit" class="btn btn-primary">
            {{ $role->exists ? 'Modifier' : 'Ajouter' }}
        </button>
    </div>
</form>
