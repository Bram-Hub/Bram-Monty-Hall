<div style="text-align: center">
    Login:
    <br> <br>

    <form wire:submit.prevent="login">
        <input wire:model="user_pass" type="password">
        <br><br>
        <button type="submit">Login</button>
    </form>

    <br>
    {{ $error_msg }}
    
</div>