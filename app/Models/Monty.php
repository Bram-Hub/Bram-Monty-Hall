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

    
    public function updMonty($data, $list, $arr){
        $monty = $this -> where($data, $list);
        return $monty -> update($arr);
    }

    /**
     * add a monty to this table
     * 
     * data contains all columns we should add it on the table for a single Monty object.
     * 
     * example code:
     * $monty -> addMonty(array('type' => 'xx', 'total_wins' => 0, 'total_losses' => 0, 'switched_times' => 0, 'total_games' => 0));
     */
    public function addMonty($data){
        $monty = new Monty();
        $monty->type = $data['type'];
        $monty->total_wins = $data['total_wins'];
        $monty->total_losses = $data['total_losses'];
        if (isset($data['matrix'])) $monty->matrix = $data['matrix'];
        $monty->switched_times = $data['switched_times'];
        $monty->total_games = $data['total_games'];
        $monty->save();
    }
}