<!DOCTYPE html>
<html>
<head>
    <title>{{ $movie->title }}</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>



<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        {{ __('messages.return') }}
    </a>

    <div class="card">
        <div class="card-body">

            <h1>{{ $movie->title }}</h1>

            @if(auth()->check() && auth()->user()->role == 'admin')

            <form method="POST"
                action="/movie/{{ $movie->id }}/poster"
                enctype="multipart/form-data">

                @csrf

                <input type="file"
                    name="poster"
                    class="form-control mb-2">

                <button type="submit" class="btn btn-primary">
                    Upload Poster
                </button>

            </form>

            <hr>

            @endif

            @if($movie->poster)
                <img src="{{ asset('storage/' . $movie->poster) }}"
                    width="300"
                    class="mb-3">
            @endif
            <hr>

            <p>
                <strong>{{ __('messages.genre') }}:</strong>
                {{ $movie->genre }}
            </p>

            <p>
                <strong>{{ __('messages.release_year') }}:</strong>
                {{ $movie->release_year }}
            </p>

            <p>
                <strong>Average Rating:</strong>
                {{ number_format($averageRating, 1) }}/10
            </p>

            <p>
                <strong>Reviews Count:</strong>
                {{ $movie->reviews->count() }}
            </p>

            <hr>
            @auth

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h4>{{ __('messages.add_review') }}</h4>
            <form method="POST" action="/movie/{{ $movie->id }}/review">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.rating') }}</label>
                    <input type="number"
                        name="rating"
                        min="1"
                        max="10"
                        class="form-control"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{ __('messages.review_text') }}</label>
                    <textarea name="text"
                            class="form-control"
                            rows="4"
                            required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('messages.save_review') }}
                </button>
            </form>
            @endauth
            @guest
                <div class="alert alert-warning">
                    {{ __('messages.login_review') }}
                </div>
            @endguest
            <hr>
            <h4>{{ __('messages.reviews') }}</h4>
            @if($movie->reviews->count())
                @foreach($movie->reviews as $review)

                    <div class="card mb-3">
                        <div class="card-body">

                            <strong>
                                {{ $review->user->name }}
                            </strong>

                            <br><br>

                            <strong>{{ __('messages.rating') }}:</strong>
                            {{ $review->rating }}/10

                            <hr>

                            {{ $review->text }}

                            <br><br>

                            @php
                            $likes = $review->reactions
                                ->where('type', 'like')
                                ->count();

                            $dislikes = $review->reactions
                                ->where('type', 'dislike')
                                ->count();
                            @endphp

                            <div class="mb-3">

                                👍 {{ $likes }}

                                👎 {{ $dislikes }}

                            </div>

                            <br><br>

                            <h6>Comments</h6>

                            @foreach($review->comments as $comment)

                                <div class="border rounded p-2 mb-2">

                                    <strong>
                                        {{ $comment->user->name }}
                                    </strong>

                                    <br>

                                    {{ $comment->text }}

                                    @if(
                                        Auth::check() &&
                                        (
                                            Auth::id() == $comment->user_id ||
                                            Auth::user()->role == 'admin'
                                        )
                                    )

                                        <form method="POST"
                                            action="/comment/{{ $comment->id }}"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger mt-2">
                                                Delete
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            @endforeach

                            @auth

                            <form method="POST"
                                action="/review/{{ $review->id }}/reaction/like"
                                class="d-inline">

                                @csrf

                                <button type="submit"
                                        class="btn btn-success btn-sm">

                                    👍 Like

                                </button>

                            </form>

                            <form method="POST"
                                action="/review/{{ $review->id }}/reaction/dislike"
                                class="d-inline">

                                @csrf

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    👎 Dislike

                                </button>

                            </form>

                            @endauth

                            @auth

                            <form method="POST"
                                action="/review/{{ $review->id }}/comment">

                                @csrf

                                <div class="mb-2">

                                    <textarea
                                        name="text"
                                        class="form-control"
                                        rows="2"
                                        placeholder="Write comment..."
                                        required></textarea>

                                </div>

                                <button type="submit"
                                        class="btn btn-sm btn-primary">
                                    Add Comment
                                </button>

                            </form>

                            @endauth
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
                                    {{ __('messages.edit') }}
                                </a>

                                <form method="POST"
                                    action="/review/{{ $review->id }}"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger">
                                        {{ __('messages.delete') }}
                                    </button>

                                </form>

                            @endif
                        </div>
                    </div>

                @endforeach
            @else
                <p>{{ __('messages.no_reviews') }}</p>
            @endif

        </div>
    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>