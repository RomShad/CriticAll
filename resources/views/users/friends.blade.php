<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.friend_list') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="/my-reviews"
       class="btn btn-secondary mb-3">
        {{ __('messages.back') }}
    </a>

    <h1>{{ __('messages.my_friends') }}</h1>

    <hr>

    @forelse($friends as $friend)

        <div class="card mb-3">

            <div class="card-body">

                <h5>{{ $friend->name }}</h5>

                <a href="/users/{{ $friend->id }}"
                   class="btn btn-primary">
                    {{ __('messages.open_profile') }}
                </a>

            </div>

        </div>

    @empty

        <p>{{ __('messages.no_friends') }}</p>

    @endforelse

</div>

</body>
</html>