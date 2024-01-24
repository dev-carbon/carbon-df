<nav class="navbar is-primary is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item brand is-size-3 has-text-weight-bold" href="{{ route('home') }}">
            Daily<span class="has-text-info">Foods</span>
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navBar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navBar" class="navbar-menu">
        <div class="navbar-end">
            <a href="{{ route('restaurant.trending') }}" class="navbar-item">Restaurants à l'affiche</a>
            <a href="{{ route('restaurant.list') }}" class="navbar-item">Nos restaurants</a>
            <a href="{{ route('about-us') }}" class="navbar-item">A propos nous</a>
        </div>

        <div class="navbar-end">
            @auth
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="navbar-dropdown">
                        <a href="{{ route('profile.edit') }}" class="navbar-item">
                            Profil
                        </a>
                        <a href="{{ route('dashboard') }}" class="navbar-item">
                            Tableau de bord
                        </a>
                        <hr class="navbar-divider">
                        <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Se déconnecter
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="{{ route('login') }}" class="button is-link">
                            <strong>Se connecter</strong>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
