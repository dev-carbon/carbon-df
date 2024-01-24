<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm fixed-top admin-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Daily<strong>Foods</strong> | <span>Admin</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}" target="_blanck">Aller sur le site</a>
                </li>
                <li class="nav-item dropdown">
                    <div class="btn-group">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        {{-- <li>
                            <hr class="dropdown-divider">
                        </li> --}}
                        <li>
                            <form method="post" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault(); document.querySelector('#logout-form').submit()">Déconnexion</a>
                            </form>
                        </li>
                    </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
