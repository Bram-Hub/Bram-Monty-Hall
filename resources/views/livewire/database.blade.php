<div class="w-full m-auto max-w-screen-xl">
    <h1 class="pageTitle">Results Database</h1>
    <p>Explore long term results of simulation data below:</p>

    <div class="tabWrapper flex items-center">
        <button wire:click="switchTab('play')" class="{{ $tab == 'play' ? 'tabWrapperActive' : '' }}">Play Mode Data</button>
        <button wire:click="switchTab('sim')" class="{{ $tab == 'sim' ? 'tabWrapperActive' : '' }}">Simulation Data</button>
        <!-- <button wire:click="add()">CLICK ME</button> -->
    </div>

    <table class="styledTable mt-4 w-full">
        <thead>
            <tr>
                @if ($tab == 'play')
                    <th>ID</th>
                    <th>Type</th>
                    <th>Total Wins</th>
                    <th>Total Losses</th>
                @elseif ($tab == 'sim')
                    <th>ID</th>
                    <th>Monty</th>
                    <th>Wins Switched</th>
                    <th>Total Switches</th>
                    <th>Total Losses</th>
                    <th>Total Wins</th>
                    <th>Total Simulations</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if ($tab == 'play')
                @foreach ($montys as $monty)
                    <tr>
                        <td>{{ $monty->id }}</td>
                        <td>{{ $monty->type }}</td>
                        <td>{{ $monty->total_wins }}</td>
                        <td>{{ $monty->total_losses }}</td>
                    </tr>
                @endforeach
            @elseif ($tab == 'sim')
                @foreach ($simulations as $simulation)
                    <tr>
                        <td>{{ $simulation->id }}</td>
                        <td>{{ $simulation->monty->type }}</td>
                        <td>{{ $simulation->wins_switched }}</td>
                        <td>{{ $simulation->total_switches }}</td>
                        <td>{{ $simulation->total_losses }}</td>
                        <td>{{ $simulation->total_wins }}</td>
                        <td>{{ $simulation->total_simulations }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
