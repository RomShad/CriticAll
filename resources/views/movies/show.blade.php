<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        ← Back to Catalogue
    </a>

    <div class="card">
        <div class="card-body">

            <h1>{{ $movie->title }}</h1>

            <hr>

            <p>
                <strong>Genre:</strong>
                {{ $movie->genre }}
            </p>

            <p>
                <strong>Release Year:</strong>
                {{ $movie->release_year }}
            </p>

            <hr>

            <h4>Reviews</h4>

            <p>No reviews yet.</p>

        </div>
    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>