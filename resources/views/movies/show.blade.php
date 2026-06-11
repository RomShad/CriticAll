<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie->title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        Return to Catalogue
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
            @auth
            <h4>Add Review</h4>
            <form method="POST" action="/movie/{{ $movie->id }}/review">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Rating (1-10)</label>
                    <input type="number"
                        name="rating"
                        min="1"
                        max="10"
                        class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Review Text</label>
                    <textarea name="text"
                            class="form-control"
                            rows="4"
                            required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Save Review
                </button>
            </form>
            @endauth
            @guest
                <div class="alert alert-warning">
                    Please log in to leave a review.
                </div>
            @endguest
            <hr>
            <h4>Reviews</h4>
            @if($movie->reviews->count())
                @foreach($movie->reviews as $review)

                    <div class="card mb-3">
                        <div class="card-body">

                            <strong>
                                {{ $review->user->name }}
                            </strong>

                            <br><br>

                            <strong>Rating:</strong>
                            {{ $review->rating }}/10

                            <hr>

                            {{ $review->text }}
                            <hr>

                            @if(
                                Auth::check() &&
                                (
                                    Auth::id() == $review->user_id ||
                                    Auth::user()->role == 'admin'
                                )
                            )

                                <a href="/review/{{ $review->id }}/edit"
                                class="btn btn-warning">
                                    Edit
                                </a>

                                <form method="POST"
                                    action="/review/{{ $review->id }}"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger">
                                        Delete
                                    </button>

                                </form>

                            @endif
                        </div>
                    </div>

                @endforeach
            @else
                <p>No reviews yet.</p>
            @endif

        </div>
    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>