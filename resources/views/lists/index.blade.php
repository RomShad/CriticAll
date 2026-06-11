<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.my_lists') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="/my-reviews" class="btn btn-secondary mb-3">
        {{ __('messages.back') }}
    </a>

    <a href="/lists/create" class="btn btn-success mb-3">
        {{ __('messages.create_list') }}
    </a>
    

    <h1>{{ __('messages.my_lists') }}</h1>

    <hr>

    @forelse($lists as $list)

        <div class="card mb-3">

            <div class="card-body">

                <h4>{{ $list->name }}</h4>

                @if($list->description)
                    <p>{{ $list->description }}</p>
                @endif

                <strong>{{ __('messages.movies') }}:</strong>

                <ul>
                    @foreach($list->movies as $movie)
                        <li>{{ $movie->title }}</li>
                    @endforeach
                </ul>

                <form method="POST"
                    action="/lists/{{ $list->id }}">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        {{ __('messages.delete_list') }}
                    </button>
                </form>

            </div>

        </div>

    @empty

        <p>{{ __('messages.no_lists') }}</p>

    @endforelse

</div>

</body>
</html>