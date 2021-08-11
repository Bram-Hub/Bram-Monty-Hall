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
}
