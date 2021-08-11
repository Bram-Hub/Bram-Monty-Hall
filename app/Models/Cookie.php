<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cookie extends Model
{
    /**
     * For use with the cookies database
     * Used to store if a user has played the game yet
     * If not, the user is shown the default page first
     * 
     * Also used in conjunction with the CheckCookie middleware
     * If the user does not have a played cookie, one is created
     * 
     * The field: id is used as a unique identifier for the user
     * since the field is encrypted the users can't see how many users we have
     */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['played'];     // true if the user has played a game before, false otherwise
    
    /* each game has a cookie of the user who played it */
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
