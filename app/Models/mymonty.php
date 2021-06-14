<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mymonty extends Model
{
    use HasFactory;

    // define the relevant table name
    protected $table = 'mymontys';

    // define the primary key
    protected $primaryKey = 'id';

    // please do not change the time
    public $timestamps = false;

    protected $fillable = ['id', 'cookie_id','monty', 'outcome', 'softdeletes'];
}
