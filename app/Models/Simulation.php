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

    public function readSimulation(){// check all results on the table
        return $this -> all();
    }

    public function oneSimulation($data, $arr){// check certain Simulation result on the table
        return $this -> where($data, $arr) -> get();
    }

    public function delSimulation($data){// delete certain Simulation
        $simulation = $this -> where($data);
        return $simulation -> delete();
    }

    public function updSimulation($data, $list, $arr){// update certain Simulation
        $simulation = $this -> where($data, $list);
        return $simulation -> update($arr);
    }

    public function addSimulation($data){// add a new simulation to the table
        return DB::table('simulations') -> insert($data);
    }
}
