<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function users()
    {
    return $this->belongsToMany(User::class, 'user_games')
                ->withPivot('level')
                ->withTimestamps();
    }

}
