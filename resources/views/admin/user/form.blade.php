<form enctype="multipart/form-data"
    action="{{ route($user->exists ? 'admin.user.update' : 'admin.user.store', ['user' => $user]) }}" method="POST">
    @csrf
    @method($user->exists ? 'PUT' : 'POST')

    @include('components.input', [
        'class' => 'mb-3',
        'label' => 'Nom',
        'name' => 'name',
        'value' => $user->name,
    ])

    @include('components.input', [
        'class' => 'mb-3',
        'label' => 'Email',
        'name' => 'email',
        'value' => $user->email,
    ])


    @include('components.input', [
        'type' => 'password',
        'class' => 'mb-3',
        'label' => 'Mot de passe',
        'name' => 'password',
    ])

    <div class="mb-3">
        <label>Role</label>
        <select class="form-select" name="role">
            <option value="">Selectionner un role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role')
            <span class="small text-danger">{{ $message }}</span>
        @enderror
    </div>

    @include('components.input', [
        'class' => 'mb-3',
        'label' => 'Avatar',
        'type' => 'file',
        'name' => 'avatar',
    ])

    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
        Annuler
    </a>
    <button type="submit" class="btn btn-primary">
        {{ $user->exists ? 'Modifier' : 'Ajouter' }}
    </button>
</form>
