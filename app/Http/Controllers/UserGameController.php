<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\UserGame;
use Illuminate\Http\Request;

class UserGameController extends Controller
{
    // Display the form
    public function create()
    {
        // Retrieve all games to populate the dropdown
        $games = Game::all();

        // Return the view with the games data
        return view('usergame.create', compact('games'));
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'game_id' => 'required',
            'level' => 'required|integer|min:1|max:10',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Create the user-game relationship
        UserGame::create([
            'user_id' => $user->id,
            'game_id' => $request->game_id,
            'level' => $request->level,
        ]);

        // Redirect to the form or a success page
        return redirect()->back()->with('success', 'User and game inserted successfully.');
    }
}
