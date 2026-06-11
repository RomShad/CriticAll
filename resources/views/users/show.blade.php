<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="/users/search"
    class="btn btn-secondary mb-3">
        {{ __('messages.back') }}
    </a>

    <h1>{{ $user->name }}</h1>
    @auth
        @if(Auth::id() != $user->id)
            @if($isFollowing)
                <form method="POST"
                    action="/users/{{ $user->id }}/unfollow">

                    @csrf

                    <button class="btn btn-danger mb-3">
                        {{ __('messages.unfollow') }}
                    </button>

                </form>

            @else

                <form method="POST"
                    action="/users/{{ $user->id }}/follow">

                    @csrf

                    <button class="btn btn-success mb-3">
                        {{ __('messages.follow') }}
                    </button>

                </form>

            @endif

        @endif

    @endauth
    <p>
        {{ __('messages.registered') }}:
        {{ $user->created_at->format('d.m.Y') }}
    </p>

    <hr>

    <h3>{{ __('messages.reviews') }}</h3>

    @forelse($user->reviews as $review)

        <div class="card mb-3">

            <div class="card-body">

                <h5>
                    {{ $review->movie->title }}
                </h5>

                <p>
                    {{ __('messages.rating') }}:
                    {{ $review->rating }}/10
                </p>

                <p>
                    {{ $review->text }}
                </p>

            </div>

        </div>

    @empty

        <p>{{ __('messages.no_reviews') }}</p>

    @endforelse

</div>

</body>
</html>