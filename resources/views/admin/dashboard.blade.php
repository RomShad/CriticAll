<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Admin Dashboard</h1>

    <div class="row">

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $usersCount }}</h3>
                    Users
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $moviesCount }}</h3>
                    Movies
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $reviewsCount }}</h3>
                    Reviews
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $commentsCount }}</h3>
                    Comments
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{ $reactionsCount }}</h3>
                    Reactions
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>