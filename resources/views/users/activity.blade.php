<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.friend_activity') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        {{ __('messages.back') }}
    </a>

    <h1>{{ __('messages.friend_activity') }}</h1>

    <hr>

    @forelse($reviews as $review)

        <div class="card mb-3">

            <div class="card-body">

                <strong>
                    {{ $review->user->name }}
                </strong>

                {{ __('messages.reviewed') }}

                <strong>
                    {{ $review->movie->title }}
                </strong>

                <br><br>

                {{ __('messages.rating') }}:
                {{ $review->rating }}/10

                <br><br>

                {{ $review->text }}

                <hr>

                <small>
                    {{ $review->created_at->diffForHumans() }}
                </small>

            </div>

        </div>

    @empty

        <p>
            {{ __('messages.no_activity') }}
        </p>

    @endforelse

</div>

</body>
</html>