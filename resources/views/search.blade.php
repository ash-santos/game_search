<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Search via Users Games and Level</h2>
        <form action="{{ route('search') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Search by User Name" value="{{ request('name') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="game" class="form-control" placeholder="Search by Game Name" value="{{ request('game') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="level" class="form-control" placeholder="Search by Game Level" value="{{ request('level') }}">
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        @if(isset($results))
            <h3>Search Results</h3>
            <ul class="list-group">
                @forelse($results as $result)
                    <li class="list-group-item">
                        <strong>User:</strong> {{ $result->user->name }}<br>
                        <strong>Game:</strong> {{ $result->game->name }}<br>
                        <strong>Level:</strong> {{ $result->level }}
                    </li>
                @empty
                    <li class="list-group-item">No results found</li>
                @endforelse
            </ul>
        @endif
    </div>
</body>
</html>
