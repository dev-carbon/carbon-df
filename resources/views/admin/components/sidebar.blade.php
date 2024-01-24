<nav id="sidebar" class="bg-light sidebar">
    <ul class="nav flex-column admin-sidebar">
        <li class="nav-item">
            <div class="d-flex align-items-center px-3">
                <i class="fas fa-tachometer-alt"></i>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </div>
        </li>
        <li class="nav-item">
            <div class="d-flex align-items-center px-3">
                <i class="fas fa-meteor"></i>
                <a class="nav-link" href="{{ route('admin.speciality.index') }}">Spécialités</a>
            </div>
        </li>
        <li class="nav-item">
            <div class="d-flex align-items-center px-3">
                <i class="fas fa-utensils"></i>
                <a class="nav-link" href="{{ route('admin.restaurant.index') }}">Restaurants</a>
            </div>
        </li>
        <li class="nav-item">
            <div class="d-flex align-items-center px-3">
                <i class="fas fa-users"></i>
                <a class="nav-link" href="{{ route('admin.user.index') }}">Utilisateurs</a>
            </div>
        </li>
        <li class="nav-item">
            <div class="d-flex align-items-center px-3">
                <i class="fas fa-user-shield"></i>
                <a class="nav-link" href="{{ route('admin.role.permission') }}">Roles & Permissions</a>
            </div>
        </li>
    </ul>
</nav>
