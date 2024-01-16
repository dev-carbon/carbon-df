<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title') | Admin</title>
</head>

<body>
    <div class="container">
        @include('components.header')
        @include('shared.flash')
        <div class="row mt-4">
            <div class="col-md-3 col-lg-2">
                <nav id="sidebar" class="bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.restaurant.index') }}">Restaurants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.restaurant.index') }}">Utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.speciality.index') }}">Spécialités</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-9 col-lg-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
