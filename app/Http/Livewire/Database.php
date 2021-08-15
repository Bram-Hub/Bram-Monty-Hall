<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Monty;
use App\Models\Simulation;

class Database extends Component
{
    public $tab = 'play';
    public $montys;
    public $simulations;

    public function mount()
    {
        $this->montys = Monty::all();
        $this->simulations = Simulation::all();
    }

    public function switchTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('livewire.database');
    }

    /*public function add()
    {
        $monty  = Monty::where('id', 1);
        $monty->insert([
          'id' => 2,
          'type' => 'Ignorant Monty',
          'total_wins' => 0,
          'total_losses' => 0,
          'matrix' => '{}',
          'switched_times' => 0,
          'total_games' => 0,
          'created_at' => '2021-08-14 06:28:30',
          'updated_at' => '2021-08-14 06:28:30',
          'deleted_at' => NULL
        ]);
    }*/
}
