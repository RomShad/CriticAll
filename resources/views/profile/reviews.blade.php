<!DOCTYPE html>
<html>
<head>
    <title>My Reviews</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        Return to Catalogue
    </a>

    <h1>My Profile</h1>

    <hr>

    <p>
        <strong>Name:</strong>
        {{ $user->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $user->email }}
    </p>

    <hr>

    <p>
        <strong>Reviews Written:</strong>
        {{ $reviewsCount }}
    </p>

    <p>
        <strong>Average Rating Given:</strong>
        {{ number_format($averageRating ?? 0, 1) }}/10
    </p>

    <p>
        <strong>Member Since:</strong>
        {{ $user->created_at->format('d.m.Y') }}
    </p>

    <hr>

    <hr>

    <h3>My Reviews</h3>

    @forelse($reviews as $review)

        <div class="card mb-3">
            <div class="card-body">

                <h5>{{ $review->movie->title }}</h5>

                <p>
                    Rating: {{ $review->rating }}/10
                </p>

                <p>
                    {{ $review->text }}
                </p>

                <small class="text-muted">
                    {{ $review->created_at->format('d.m.Y H:i') }}
                </small>

            </div>
        </div>

    @empty

        <p>You have not written any reviews yet.</p>

    @endforelse

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>