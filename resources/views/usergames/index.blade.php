@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User Games</h1>
    
    <ul>
        @foreach ($userGames as $userGame)
            <li>
                @if ($userGame->game)
                    {{ $userGame->game->name }} - Level: {{ $userGame->level }}
                @else
                    Game not found - Level: {{ $userGame->level }}
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
