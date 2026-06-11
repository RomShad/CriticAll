<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.search_users') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="/" class="btn btn-secondary mb-3">
        {{ __('messages.back') }}
    </a>

    <h1>{{ __('messages.search_users') }}</h1>

    <form method="GET">

        <div class="input-group mb-3">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="{{ __('messages.username') }}">

            <button class="btn btn-primary">
                {{ __('messages.search') }}
            </button>

        </div>

    </form>

    @foreach($users as $user)

        <div class="card mb-2">

            <div class="card-body">

                <h5>{{ $user->name }}</h5>

                <a href="/users/{{ $user->id }}"
                   class="btn btn-primary">
                    {{ __('messages.open_profile') }}
                </a>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>