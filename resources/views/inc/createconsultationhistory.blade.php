<div class="container-fluid">
    <div class="row justify-content-between mt-4">
        <div class="display-6">
            Add Consultation History
        </div>
    </div>

    <div class="row justify-content-between mt-4">
        <form action="{{ route('consultationhistory.store') }}" method="post">
            @csrf

            <div class="form-group">

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="_date">
                        </div>
                        <div class="col">
                            <label for="_procedure" class="form-label">Procedure</label>
                            <input type="text" class="form-control" name="procedure" id="_procedure" placeholder="Procedure done ..">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_weight" class="form-label">Weight</label>
                            <input type="text" name="weight" class="form-control" id="_weight" placeholder="(kg)">
                        </div>
    
                        <div class="col">
                            <label for="_temp" class="form-label">Temp</label>
                            <input type="text" name="temp" class="form-control" id="_temp" placeholder="(Celsius)">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="_vet" class="form-label">Veterinarian</label>
                            <input type="text" name="vet" class="form-control" id="_vet" placeholder="Attending vet ...">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="recid" value="{{ $records->recid }}">

                <div class="mb-3 d-grid gap-2">
                    <button class="btn btn-success" type="submit">Insert History</button>
                </div>

            </div>

        </form>
    </div>
</div>