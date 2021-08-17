<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Simulation;

class Research extends Component
{

    protected $listeners = ['add-to-database' => 'addToDatabase', 'set-game-text' => 'setGameText', 'set-img-src' => 'setImgSrc', 'set-background-color' => 'setBtnBackgroundColor', 'set-border-color' => 'setBtnBorderColor'];
    public $gameText = "Pick a door";
    public $door1imgsrc = "img/closedDoor.png";
    public $door2imgsrc = "img/closedDoor.png";
    public $door3imgsrc = "img/closedDoor.png";
    public $door1backgroundcolor = "white";
    public $door2backgroundcolor = "white";
    public $door3backgroundcolor = "white";
    public $door1borderColor = "white";
    public $door2borderColor = "white";
    public $door3borderColor = "white";

    public function render()
    {
        return view('livewire.research');
    }

    public function setGameText($text)
    {
        if ($text == "+won") {
            $this->gameText = $this->gameText . " You won.";
        } elseif ($text == "+lost") {
            $this->gameText = $this->gameText . " You lose.";
        } else {
            $this->gameText = $text;
        }
    }

    public function setImgSrc($door, $src)
    {
        if ($door == 1) {
            $this->door1imgsrc = $src;
        } elseif ($door == 2) {
            $this->door2imgsrc = $src;
        } elseif ($door == 3) {
            $this->door3imgsrc = $src;
        }
    }

    public function setBtnBackgroundColor($door, $color)
    {
        if ($door == 1) {
            $this->door1backgroundcolor = $color;
        } elseif ($door == 2) {
            $this->door2backgroundcolor = $color;
        } elseif ($door == 3) {
            $this->door3backgroundcolor = $color;
        }
    }

    public function setBtnBorderColor($door, $color)
    {
        if ($door == 1) {
            $this->door1borderColor = "border-" . $color;
        } elseif ($door == 2) {
            $this->door2borderColor = "border-" . $color;
        } elseif ($door == 3) {
            $this->door3borderColor = "border-" . $color;
        }
    }

    public function addToDatabase($d)
    {
        $data = [
            'monty_id' => $d['monty_id'],
            'behavior_matrix' => $d['behavior'] ? '{"Always Switch": true}' : '{"Always Switch": false}',
            'wins_switched' => $d['wins_switched'],
            'total_switches' => $d['total_switches'],
            'total_losses' => $d['total_losses'],
            'total_wins' => $d['total_wins'],
            'total_simulations' => $d['total_simulations']
        ];
        Simulation::createSimulation($data);
    }
}
