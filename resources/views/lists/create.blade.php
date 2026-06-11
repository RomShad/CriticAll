<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.create_list') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="/lists" class="btn btn-secondary mb-3">
        {{ __('messages.back') }}
    </a>

    <h1>{{ __('messages.create_movie_list') }}</h1>

    <form method="POST" action="/lists">

        @csrf

        <div class="mb-3">

            <label>{{ __('messages.list_name') }}</label>

            <input
                type="text"
                name="name"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label>{{ __('messages.description') }}</label>

            <textarea
                name="description"
                class="form-control"></textarea>

        </div>

        <div class="mb-3">

            <label>{{ __('messages.movies') }}</label>

            @foreach($movies as $movie)

                <div>

                    <input
                        type="checkbox"
                        name="movies[]"
                        value="{{ $movie->id }}">

                    {{ $movie->title }}

                </div>

            @endforeach

        </div>

        <button
            type="submit"
            class="btn btn-success">

            {{ __('messages.create') }}

        </button>

    </form>

</div>

</body>
</html>