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

    /**
     * add a new simulation to the table
     * 
     * data contains all columns we should add it on the table for a single Simulation object.
     * 
     * example code:
     * $simulation -> addSimulation(array('monty_id' => 1, 'behavior_matrix' => '{"Peter":35,"Ben":37,"Joe":43}', 'wins_switches' => 2, 
     * 'total_switches' => 2, 'total_losses' => 2, 'total_wins' => 2, 'total_simulations' => 2));
     */
    public function addSimulation($data){
        $simulation = new Simulation();
        $simulation -> monty_id = $data['monty_id'];
        $simulation -> behavior_matrix = $data['behavior_matrix'];
        $simulation -> wins_switches = $data['wins_switches'];
        $simulation -> total_switches = $data['total_switches'];
        $simulation -> total_losses = $data['total_losses'];
        $simulation -> total_wins = $data['total_wins'];
        $simulation -> total_simulations = $data['total_simulations'];

        $subsimulation = $this -> where('monty_id', $simulation -> monty_id)
        -> where( 'behavior_matrix', $simulation -> behavior_matrix) -> first();
        if ($subsimulation != null){
            $subsimulation -> wins_switches += $simulation -> wins_switches;
            $subsimulation -> total_switches += $simulation -> total_switches;
            $subsimulation -> total_losses += $simulation -> total_losses;
            $subsimulation -> total_wins += $simulation -> total_wins;
            $subsimulation -> total_simulations += $simulation -> total_simulations;
            $subsimulation -> save();
        }else{
            $simulation -> save();
        }
    }
}
