<!-- resources/views/usergame/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add User and Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Add User and Game</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for adding a user and a game -->
    <form action="{{ route('user-game.store') }}" method="POST">
        @csrf

        <!-- User Name -->
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        </div>

        <!-- Game Dropdown -->
        <div class="form-group">
            <label for="game_id">Select Game</label>
            <select class="form-control" id="game_id" name="game_id" required>
                <option value="">Choose a game</option>
                @foreach($games as $game)
                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Game Level -->
        <div class="form-group">
            <label for="level">Game Level</label>
            <input type="number" class="form-control" id="level" name="level" placeholder="Enter level" min="1" max="10" required>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
