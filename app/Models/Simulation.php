<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Simulation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function monty()
    {
        return $this->belongsTo(Monty::class);
    }
}
