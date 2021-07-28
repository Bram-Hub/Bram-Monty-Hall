<?php

use App\Models\Monty;
use App\Models\Game;
use App\Models\Cookie;
use App\Models\Simulation;


// $monty = new Monty();
// $monty->type = "normal";
// $monty->total_wins = 0;
// $monty->total_losses = 0;
// $monty->switched_times = 0;
// $monty -> total_games = 0;
// $monty->save();


//$monty = Monty::findOrFail(1);
//echo($monty->type);

// $monty->games()->create(['cookie_id' => 111, 'outcome' => true]);

//$y = $monty -> delMonty(array('type' => 'xx'));
//$monty -> updMonty('id', 1, array('type' => 'yy'));
// echo($monty -> oneMonty('id', 1));

/*
$monty = new Monty();
$monty -> addMonty(array('type' => 'xx', 'total_wins' => 0, 'total_losses' => 0, 'switched_times' => 0, 'total_games' => 0));

$cookie = new Cookie();
$cookie->played = True;
$cookie -> save();
$game = new Game();
$game -> addGame(array('cookie_id' => 1, 'monty_id' => 1, 'outcome' => True, 'door_picked' => 1, 'door_opened' => 3, 'door_car' => 1));

$simulation = new Simulation();
$simulation -> addSimulation(array('monty_id' => 1, 'behavior_matrix' => '{"Peter":35,"Ben":37,"Joe":43}', 'wins_switches' => 2, 
'total_switches' => 2, 'total_losses' => 2, 'total_wins' => 2, 'total_simulations' => 2));
$simulation -> addSimulation(array('monty_id' => 1, 'behavior_matrix' => '{"Peter":35,"Ben":37,"Joe":43}', 'wins_switches' => 2, 
'total_switches' => 2, 'total_losses' => 2, 'total_wins' => 2, 'total_simulations' => 2));
*/
$cookie = new Cookie();
$cookie->played = True;
$cookie -> save();

$dataGame = ['cookie_id' => 1, 'monty_id' => 1, 'door_picked' => 1, 'door_opened' => 2, 'door_car' => 3];
Game::createGame($dataGame);
// Game::deleteGame(7);

$dataSim = ['monty_id' => 1, 'behavior_matrix' => '{"Always Switch": false}', 'wins_switched' => 40, 
            'total_switches' => 50, 'total_losses' => 40, 'total_wins' => 60, 'total_simulations' => 100];
Simulation::createSimulation($dataSim);
