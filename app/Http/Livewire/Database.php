<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Database extends Component
{
    public $tab = 'play';

    public function switchTab($tab) {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('livewire.database');
    }
}
