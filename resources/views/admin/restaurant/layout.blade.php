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
    <title>@yield('title') | Admin</title>
</head>

<body>
    <div class="container">
        @include('components.header')
        @include('shared.flash')
        <div class="row mt-4">
            <div class="col-md-4 col-lg-2">
                <nav id="sidebar" class="sidebar bg-light">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.restaurant.index') }}">Restaurants</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-md-8 col-lg-10">
                <div class="row">
                    <div class="col-md-8">
                        @yield('content')
                    </div>

                    <div class="col-md-4">
                        <h3>Détails restaurant</h3>

                        @if ($restaurant->exists)
                            <div class="d-grid">
                                <strong>{{ $restaurant->name }}</strong>
                                <span class="text-muted">{{ $restaurant->speciality }}</span>
                                <span>{{ $restaurant->phone }}</span>
                                <span>{{ $restaurant->address() }}</span>
                                <span>{{ $restaurant->description }}</span>
                            </div>

                            <div class="d-grid">
                                @foreach ($restaurant->images as $image)
                                <div class="col">
                                    <img src="{{ asset($image->image_path) }}" alt="{{ $restaurant->name }}" class="img-thumbnail" alt="{{ $restaurant->name }}">
                                </div>
                                @endforeach
                            </div>

                            <div class="mt-3">
                                <a class="btn btn-secondary" href="{{ route('admin.restaurant.edit', ['restaurant' => $restaurant]) }}">Modifier</a>
                            </div>
                        @else
                            <p class="text-muted">Restaurant inexistant</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
