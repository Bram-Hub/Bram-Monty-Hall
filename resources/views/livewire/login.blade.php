<div>
    <p> Enter the admin password: </p>

    <form wire:submit.prevent="login">
        <input wire:model="user_pass" type="password"/>
        <br/><br/>
        <button type="submit">Login</button>
    </form>

    <br/>
    <p class="bad"> {{ $error_msg }} </p>
    
</div>