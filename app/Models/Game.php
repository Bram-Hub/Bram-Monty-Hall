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

    protected $fillable = ['outcome', 'door_picked', 'door_opened', 'door_car', 'door_switched', 'details'];

    public function monty()
    {
        return $this->belongsTo(Monty::class);
    }

    public function cookie()
    {
        return $this->belongsTo(Cookie::class);
    }

    // Given an id, delete the game, and update the corresponding monty
    public static function deleteGame($id)
    {
        $game = Game::findOrFail($id);
        $monty = $game->monty;

        if (isset($game->door_switched))
            $monty->switched_times -= 1;

        if ($game->won())
            $monty->total_wins -= 1;
        else
            $monty->total_losses -= 1;

        $monty->total_games -= 1;
        $monty->save();
        $game->delete();

        return True;
    }

    /**
     * add a new game to the table
     * 
     * data contains all columns we should add it on the table for a single Game object.
     * 
     * example code:
     * $game -> createGame(array('cookie_id' => 1, 'monty_id' => 1, 'outcome' => True, 'door_picked' => 1, 'door_opened' => 3, 'door_car' => 1));
     */
    public static function createGame($data)
    {
        $game = new Game();

        $game->fill($data);
        $game->cookie_id = $data['cookie_id'];
        $game->monty_id = $data['monty_id'];
       
        $monty = Monty::findOrFail($data['monty_id']);
        
        if (isset($data['door_switched']))
            $monty->switched_times += 1;

        if ($game->won()) {
            $monty->total_wins += 1;
            $game->outcome = True;
        } else {
            $monty->total_losses += 1;
            $game->outcome = False;
        }

        $monty->total_games += 1;
        
        $monty->save();
        $game->save();

        return True;
    }

    // Returns true or fails if they won
    public function won()
    {
        if ($this->door_picked == $this->door_car && !isset($this->door_switched)) 
            return True;
        
        if ($this->door_switched == $this->door_car)
            return True;
    }
}
