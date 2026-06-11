<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">

    <h1>Edit Review</h1>

    <form method="POST" action="/review/{{ $review->id }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Rating</label>

            <input type="number"
                   name="rating"
                   min="1"
                   max="10"
                   value="{{ $review->rating }}"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Review Text</label>

            <textarea name="text"
                      rows="5"
                      class="form-control"
                      required>{{ $review->text }}</textarea>
        </div>

        <button type="submit"
                class="btn btn-primary">
            Save Changes
        </button>

        <a href="/movie/{{ $review->movie_id }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>