<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="display-6">
            Add Medical History
        </div>
    </div>

    <div class="row justify-content-between mt-4">
        <form action="{{ route('medicalhistory.store') }}" method="post">
            @csrf

            <div class="form-group">
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="_date">
                        </div>
                        <div class="col">
                            <label for="_weight" class="form-label">Weight (kg)</label>
                            <input type="text" name="weight" class="form-control" id="_weight">
                        </div>
                        <div class="col">
                            <label for="_temp" class="form-label">Temp (C)</label>
                            <input type="text" name="temp" class="form-control" id="_temp">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_diagnosis" class="form-label">Diagnosis</label>
                            <input type="text" name="checkup" class="form-control" id="_diagnosis">
                        </div>
                        <div class="col">
                            <label for="_treatment" class="form-label">Treatment</label>
                            <input type="text" name="treatment" class="form-control" id="_diagnosis">
                        </div>
                        <div class="col">
                            <label for="_vxmx" class="form-label">VX/MX</label>
                            <input type="text" name="vxmx" class="form-control" id="_vxmx">
                        </div>
                        <input type="hidden" name="recid" value="{{ $healthrecords->recid }}">
                    </div>
                </div>

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Add History</button>
                </div>
            </div>
        </form>
    </div>
</div>