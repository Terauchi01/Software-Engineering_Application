<div class="container">
    <h1>Edit Coop Drone Info</h1>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form id="editCoopDroneForm" method="post" action="{{ route('admin.editCoopDrone', $Drone->id) }}">
        @csrf

        <div class="form-group">
            <label for="drone_type_id">Drone Type</label>
            <input type="number" name="drone_type_id" class="form-control" value="{{ old('drone_type_id', $Drone->drone_type_id) }}" required>
        </div>
        
        <div class="form-group">
            <label for="coop_user_id">Coop User</label>
            <input type="number" name="coop_user_id" class="form-control" value="{{ old('coop_user_id', $Drone->coop_user_id) }}">
        </div>
        
        <div class="form-group">
            <label for="purchase_date">Purchase Date</label>
            <input type="date" name="purchase_date" class="form-control" value="{{ old('purchase_date', \Carbon\Carbon::parse($Drone->purchase_date)->toDateString()) }}" required>
        </div>
        
        <div class="form-group">
            <label for="drone_status">Drone Status</label>
            <input type="number" name="drone_status" class="form-control" value="{{ old('drone_status', $Drone->drone_status) }}" required>
        </div>
        
        <div class="form-group">
            <label for="possession_or_loan">Possession or Loan</label>
            <input type="number" name="possession_or_loan" class="form-control" value="{{ old('possession_or_loan', $Drone->possession_or_loan) }}" required>
        </div>
        
        <div class="form-group">
            <label for="lending_period">Lending Period</label>
            <input type="date" name="lending_period" class="form-control" value="{{ old('lending_period', \Carbon\Carbon::parse($Drone->lending_period)->toDateString()) }}">
        </div>
        
        <div class="form-group">
            <label for="operating_time">Operating Time</label>
            <input type="number" name="operating_time" class="form-control" value="{{ old('operating_time', $Drone->operating_time) }}" required>
        </div>

        <input type="hidden" name="id" value="{{ $Drone->id }}">

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

