<!DOCTYPE html>
<html>
<a href="/lang/en" class="btn btn-secondary">EN</a>
<a href="/lang/lv" class="btn btn-secondary">LV</a>
<br><br>
<head>
    <div class="mb-3">
        @auth
            <a href="/my-reviews" class="btn btn-primary">
                My Profile
            </a>

            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Logout
                </button>
            </form>
        @else
            <button class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                {{ __('messages.login') }}
            </button>

            <button class="btn btn-success"
                    data-bs-toggle="modal"
                    data-bs-target="#registerModal">
                {{ __('messages.register') }}
            </button>
            <a href="/my-reviews" class="btn btn-info"> My Reviews </a>
        @endauth
    </div>
    <title>CriticAll</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <form method="GET" action="/" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search movie..."
                    value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select
                    name="sort"
                    class="form-select">
                    <option value="">
                        Sort By
                    </option>
                    <option value="title">
                        Title
                    </option>
                    <option value="genre">
                        Genre
                    </option>
                    <option value="year">
                        Release Year
                    </option>
                </select>
            </div>

            <div class="col-md-3">

                <button
                    type="submit"
                    class="btn btn-primary">

                    Search

                </button>

            </div>

        </div>

    </form>

    @if($topMovies->count())

        <div class="card mb-4">
            <div class="card-body">

                <h3>Top Rated Movies</h3>

                <ol>
                    @foreach($topMovies as $movie)

                        <li>
                            <strong>{{ $movie->title }}</strong>

                            @if($movie->reviews_avg_rating)
                                ({{ number_format($movie->reviews_avg_rating, 1) }}/10)
                            @endif
                        </li>

                    @endforeach
                </ol>

            </div>
        </div>

    @endif
    <h1>{{ __('messages.catalogue') }}</h1>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-3 mb-4">
                <a href="/movie/{{ $movie->id }}" class="text-decoration-none text-dark">

                    <div class="card h-100">
                        @if($movie->poster)
                            <img src="{{ asset('storage/' . $movie->poster) }}"
                                class="card-img-top"
                                style="height:250px; object-fit:cover;">
                        @endif
                        <div class="card-body">

                            <h5>{{ $movie->title }}</h5>
                            <p>
                                {{ __('messages.genre') }}: {{ $movie->genre }}
                            </p>
                            <p>
                                {{ __('messages.year') }}: {{ $movie->release_year }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Login</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Login
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Register</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text"
                                name="name"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email"
                                name="email"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password"
                                name="password"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password"
                                name="password_confirmation"
                                class="form-control"
                                required>
                        </div>

                        <button type="submit"
                                class="btn btn-success">
                            Register
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
{{ app()->getLocale() }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>