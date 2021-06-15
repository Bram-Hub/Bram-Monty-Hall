<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cookie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['outcome', 'details'];
    
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
