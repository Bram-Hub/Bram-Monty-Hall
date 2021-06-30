<div class="w-full m-auto max-w-screen-xl">
    <h1 class="pageTitle">Results Database</h1>
    <p>Explore long term results of simulation data below:</p>
    
    <div class="tabWrapper flex items-center">
        <button wire:click="switchTab('play')" class="{{ $tab == 'play' ? 'tabWrapperActive' : '' }}">Play Mode Data</button>
        <button wire:click="switchTab('sim')" class="{{ $tab == 'sim' ? 'tabWrapperActive' : '' }}">Simulation Data</button>
        <button wire:click="switchTab('both')" class="{{ $tab == 'both' ? 'tabWrapperActive' : '' }}">Both</button>
    </div>

    <table class="styledTable mt-4 w-full">
        <thead>
            <tr>
                <th>Title1</th>
                <th>Title1</th>
                <th>Title1</th>
                <th>Title1</th>
                <th>Title1</th>
                <th>Title1</th>
                <th>Title1</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data1</td>
                <td>Data1</td>
                <td>Data1</td>
                <td>Data1</td>
                <td>Data1</td>
                <td>Data1</td>
                <td>Data1</td>
            </tr>
        </tbody>
    </table> 
</div>

