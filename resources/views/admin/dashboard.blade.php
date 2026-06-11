<!DOCTYPE html>
<html>
<head>
    <title>{{ __('messages.admin_dashboard') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>{{ __('messages.admin_dashboard') }}</h1>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $usersCount }}</h3>
                    {{ __('messages.users') }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $moviesCount }}</h3>
                    {{ __('messages.movies') }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $reviewsCount }}</h3>
                    {{ __('messages.reviews') }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $commentsCount }}</h3>
                    {{ __('messages.comments') }}
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $reactionsCount }}</h3>
                    {{ __('messages.reactions') }}
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>