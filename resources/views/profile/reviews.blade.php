<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.my_profile') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        Return to Catalogue
    </a>

    <a href="/friends"class="btn btn-warning mb-3">
        {{ __('messages.friend_list') }}
    </a>

    <a href="/lists" class="btn btn-success mb-3">
        {{ __('messages.my_lists') }}
    </a>


    <h1>{{ __('messages.my_profile') }}</h1>

    <hr>

    <p>
        <strong>{{ __('messages.name') }}:</strong>
        {{ $user->name }}
    </p>

    <p>
        <strong>{{ __('messages.email') }}:</strong>
        {{ $user->email }}
    </p>

    <hr>

    <p>
        <strong>{{ __('messages.reviews_written') }}:</strong>
        {{ $reviewsCount }}
    </p>

    <p>
        <strong>{{ __('messages.average_rating_given') }}:</strong>
        {{ number_format($averageRating ?? 0, 1) }}/10
    </p>

    <p>
        <strong>{{ __('messages.member_since') }}:</strong>
        {{ $user->created_at->format('d.m.Y') }}
    </p>

    <hr>

    <hr>

    <h3>{{ __('messages.my_reviews') }}</h3>

    @forelse($reviews as $review)

        <div class="card mb-3">
            <div class="card-body">

                <h5>{{ $review->movie->title }}</h5>

                <p>
                    {{ __('messages.rating') }}: {{ $review->rating }}/10
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

        <p>{{ __('messages.no_user_reviews') }}</p>

    @endforelse

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>