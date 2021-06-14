<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class monty_result extends Model
{
    use HasFactory;

    // define the relevant table name
    protected $table = 'monty_results';

    // define the primary key

    // please do not change the time
    //public $timestamps = false;

    protected $fillable = [ 'monty', 'total_wins', 'total_loss'];
}
