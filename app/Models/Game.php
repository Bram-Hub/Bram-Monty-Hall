<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['outcome', 'details'];

    public function monty()
    {
        return $this->belongsTo(Monty::class);
    }

    /* each game points to the cookie of the user who played it */
    public function cookie()
    {
        return $this->belongsTo(Cookie::class);
    }

    public function readGame(){//check the whole game table
        return $this -> all();
    }

    public function oneGame($data, $arr){// check for one certain game
        return $this -> where($data, $arr) -> get();
    }

    public function delGame($data){// delete certain game
        $game = $this -> where($data);
        return $game -> delete();
    }

    public function updGame($data, $list, $arr){// update certain game
        $game = $this -> where($data, $list);
        return $game -> update($arr);
    }

    public function addGame($data){// add a new game to the table
        return DB::table('games') -> insert($data);
    }
}
