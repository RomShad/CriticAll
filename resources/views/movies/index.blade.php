<!DOCTYPE html>
<html>
<head>
    <title>CriticAll</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    <h1>CriticAll Movie Catalogue</h1>
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-3 mb-4">
                <a href="/movie/{{ $movie->id }}" class="text-decoration-none text-dark">

                    <div class="card">
                        <div class="card-body">

                            <h5>{{ $movie->title }}</h5>
                            <p>
                                Genre: {{ $movie->genre }}
                            </p>
                            <p>
                                Year: {{ $movie->release_year }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>