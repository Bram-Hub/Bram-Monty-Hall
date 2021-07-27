<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Simulation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['behavior_matrix', 'wins_switched', 'total_switches', 'total_losses', 'total_wins', 'total_simulations'];

    public function monty()
    {
        return $this->belongsTo(Monty::class);
    }

    /**
     * add a new simulation to the table
     * 
     * data contains all columns we should add it on the table for a single Simulation object.
     * 
     * Example:
     * Simulation::createSimulation(['monty_id' => 1, 'behavior_matrix' => '{"Always Switch": false}', 'wins_switched' => 40, 
     *      'total_switches' => 50, 'total_losses' => 40, 'total_wins' => 60, 'total_simulations' => 100]);
     */
    public static function createSimulation($data)
    {
        // Find if simulation already exists
        $simulations = Simulation::where([
            ['monty_id', '=', $data['monty_id']],
        ])->get();

        $simulation = NULL;

        foreach ($simulations as $sim) {
            if ($sim->behavior_matrix == $data['behavior_matrix']) {
                $simulation = $sim;
                break;
            }     
        }

        if ($simulation) {
            $simulation->wins_switched += $data['wins_switched'];
            $simulation->total_switches += $data['total_switches'];
            $simulation->total_losses += $data['total_losses'];
            $simulation->total_wins += $data['total_wins'];
            $simulation->total_simulations += $data['total_simulations'];
        } else {
            $simulation = new Simulation();

            $simulation->fill($data);
            $simulation->monty_id = $data['monty_id'];
        }

        $simulation -> save();

        return True;
    }
}
