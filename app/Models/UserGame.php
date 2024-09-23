<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGame extends Model
{
    use HasFactory;
    protected $table = 'user_games';
    protected $fillable = [
        'user_id',  // Allow mass assignment of user_id
        'game_id',  // Allow mass assignment of game_id
        'level',    // Allow mass assignment of level
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }   
}
