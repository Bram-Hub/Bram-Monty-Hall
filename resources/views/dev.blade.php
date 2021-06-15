<?php

use App\Models\Monty;
use App\Models\Game;

/*
$monty = new Monty();
$monty->type = "normal";
$monty->total_wins = 0;
$monty->total_losses = 0;

$monty->save();
*/

$monty = Monty::findOrFail(1);
echo($monty->type);

$monty->games()->create(['cookie_id' => 111, 'outcome' => true]);
