<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Monty;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['outcome', 'details'];

    public function monty()
    {
        return $this->belongsTo(Monty::class);
    }

    /* each game points to the cookie of the user who played it */
    public function cookie()
    {
        return $this->belongsTo(Cookie::class);
    }

    public function readGame(){//check the whole game table
        return $this -> all();
    }

    public function oneGame($data, $arr){// check for one certain game
        return $this -> where($data, $arr) -> get();
    }

    public function delGame($data){// delete certain game
        $game = $this -> where($data) -> first();
        $monty = Monty::findOrFail($game->monty_id);
        if (isset($game -> door_switched)) $monty->switched_times -= 1;
        if (($monty -> door_picked == $monty -> door_car && !isset($monty -> door_switched)) || (
            $monty -> door_picked != $monty -> door_car && $monty -> door_opened != $monty -> door_car &&
            isset($monty -> door_switched)
        )){
            $monty -> total_wins -= 1;
        }else{
            $monty -> total_losses -= 1;
        }
        $monty -> total_games -= 1;
        $monty -> save();
        return $game -> delete();
    }

    public function updGame($data, $list, $arr){// update certain game
        $game = $this -> where($data, $list);
        return $game -> update($arr);
    }

    /**
     * add a new game to the table
     * 
     * data contains all columns we should add it on the table for a single Game object.
     * 
     * example code:
     * $game -> addGame(array('cookie_id' => 1, 'monty_id' => 1, 'outcome' => True, 'door_picked' => 1, 'door_opened' => 3, 'door_car' => 1));
     */
    public function addGame($data){
        $game = new Game();
        $game->cookie_id = $data['cookie_id'];
        $game->monty_id = $data['monty_id'];
        $game->outcome = $data['outcome'];
        $game->door_picked = $data['door_picked'];
        $game->door_opened = $data['door_opened'];
        $game->door_car = $data['door_car'];
        if(isset($data['door_switched'])) $game->door_switched = $data['door_switched'];
        if(isset($data['details'])) $game->details = $data['details'];
        $monty = Monty::findOrFail($data['monty_id']);
        if (isset($data['door_switched'])) $monty->switched_times += 1;
        if (($data['door_picked'] == $data['door_car'] && !isset($data['door_switched'])) || (
            $data['door_picked'] != $data['door_car'] && $data['door_opened'] != $data['door_car'] && 
            isset($data['door_switched'])
        )){
            $monty->total_wins += 1;
        }else{
            $monty->total_losses += 1;
        }

        $monty->total_games += 1;
        $monty->save();
        $game->save();
    }
}
