<!DOCTYPE html>
<html>
<head>
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h1>Users</h1>

    <table class="table">

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Blocked</th>
        </tr>

        <th>Action</th>
        @foreach($users as $user)

            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->is_blocked }}</td>
            </tr>

            <td>
                @if($user->role != 'admin')

                    <form method="POST"
                        action="/admin/users/{{ $user->id }}/toggle-block">

                        @csrf

                        @if($user->is_blocked)
                            <button class="btn btn-success">
                                Unblock
                            </button>
                        @else
                            <button class="btn btn-danger">
                                Block
                            </button>
                        @endif

                    </form>

                @endif
            </td>
        @endforeach

    </table>

</div>

</body>
</html>