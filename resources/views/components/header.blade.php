<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">DailyFoods</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <div class="ms-auto">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light" type="submit">Rechercher</button>
                </form>
            </div>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 column-gap-1">
                @auth
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-light">Déconnexion</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-light" href="{{ route('login') }}">Connexion</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
