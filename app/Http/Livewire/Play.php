<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class Play extends Component
{
    protected $cookie = 1;
    protected $listeners = ['add-to-database' => 'addToDatabase', 'set-game-text' => 'setGameText', 'set-img-src' => 'setImgSrc', 'set-background-color' => 'setBtnBackgroundColor'];
    public $gameText = "Pick a door";
    public $door1imgsrc = "img/closedDoor.png";
    public $door2imgsrc = "img/closedDoor.png";
    public $door3imgsrc = "img/closedDoor.png";
    public $door1backgroundcolor = "white";
    public $door2backgroundcolor = "white";
    public $door3backgroundcolor = "white";

    public function render()
    {
        return view('livewire.play');
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

    public function addToDatabase($d)
    {
        $data = [
            'cookie_id' => $this->cookie,
            'monty_id' => $d['monty_id'],
            'door_picked' => $d['door_picked'],
            'door_opened' => $d['door_opened'],
            'door_car' => $d['door_car']
        ];
        $this->cookie += 1;
        Game::createGame($data);
    }
}
