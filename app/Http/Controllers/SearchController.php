<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserGame;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $name = $request->input('name');
        $game = $request->input('game');
        $level = $request->input('level');

        // Query the user_games table with related user and game data
        $query = UserGame::query();

        if ($name) {
            $query->whereHas('user', function ($q) use ($name) {
                $q->where('name', 'like', '%' . $name . '%');
            });
        }

        if ($game) {
            $query->whereHas('game', function ($q) use ($game) {
                $q->where('name', 'like', '%' . $game . '%');
            });
        }

        if ($level) {
            $query->where('level', $level);
        }

        $results = $query->with(['user', 'game'])->get();

        return view('search', compact('results'));
    }
}
