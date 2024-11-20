<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Toegestane velden voor mass-assignment
    protected $fillable = ['title', 'user_id'];

    // Relatie met de User (een game hoort bij één gebruiker)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
