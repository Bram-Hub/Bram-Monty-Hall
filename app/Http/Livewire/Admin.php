<?php
 
namespace App\Http\Livewire;

use Livewire\Component;

class Admin extends Component
{
    private $login = false;

    public $user_pass;
    public $error_msg;

    /**
     * - called from login.blade.php 
     * - used for logging in the user 
     */
    public function login() 
    {   
        $pass = env('ADMIN_PASSWORD', NULL);

        if ( $pass != NULL && $pass == $this->user_pass ) {
            $this->login = true;
        }
        
        $this->error_msg = "Incorrect Login, try again.";
    }

    public function render()
    {
        if ( $this->login == true ) {
            return view('livewire.admin');
        }
        
        return view('livewire.login');
    }
}
