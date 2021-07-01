<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

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

    public function simulations()
    {
        return $this->hasMany(Simulation::class);
    }


    public function readMonty(){// read all montys
        return $this -> all();
    }

    public function oneMonty($data, $arr){// check for one monty
        return $this -> where($data, $arr) -> get();
    }

    public function delMonty($data){// delete certain monty
        $monty = $this -> where($data);
        return $monty -> delete();
    }

    public function updMonty($data, $list, $arr){// update certain monty
        $monty = $this -> where($data, $list);
        return $monty -> update($arr);
    }

    public function addMonty($data){// add a monty to this table
        return DB::table('montys') -> insert($data);
    }
}