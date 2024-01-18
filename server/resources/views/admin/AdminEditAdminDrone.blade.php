<div class="container">
        <h1>Edit Drone</h1>
        
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="post" action="{{ route('admin.editDrone', $Drone->id) }}">
            @csrf

            <div class="form-group">
                <label for="number_of_drones">Number of Drones</label>
                <input type="number" name="number_of_drones" class="form-control" value="{{ old('number_of_drones', $Drone->number_of_drones) }}" required>
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $Drone->name) }}" maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="range">Range</label>
                <input type="number" name="range" class="form-control" value="{{ old('range', $Drone->range) }}" required>
            </div>

            <div class="form-group">
                <label for="loading_weight">Loading Weight</label>
                <input type="number" name="loading_weight" class="form-control" value="{{ old('loading_weight', $Drone->loading_weight) }}" required>
            </div>

            <div class="form-group">
                <label for="max_time">Max Time</label>
                <input type="number" name="max_time" class="form-control" value="{{ old('max_time', $Drone->max_time) }}" required>
            </div>

            <div class="form-group">
                <label for="lend_drones_sum">Lend Drones Sum</label>
                <input type="number" name="lend_drones_sum" class="form-control" value="{{ old('lend_drones_sum', $Drone->lend_drones_sum) }}" required>
            </div>

            <input type="hidden" name="id" value="{{ $Drone->id }}">

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>