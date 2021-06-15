<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Monty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'montys';
    protected $fillable = [ 'type', 'total_wins', 'total_losses'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}